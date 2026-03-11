<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\AI\Ollama;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;
use Spatie\QueueableAction\QueueableAction;

class ChatOllamaAction
{
    use QueueableAction;

    private Client $client;

    private array $defaultOptions = [
        'num_predict' => 256,
        'temperature' => 0.3,
        'top_k' => 20,
        'top_p' => 0.7,
        'num_ctx' => 1024,
    ];

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => config('services.ollama.url', 'http://localhost:11434'),
            'timeout' => 120.0,
        ]);
    }

    public function execute(string $message, array $options = []): array
    {
        $payload = [
            'model' => $options['model'] ?? config('services.ollama.model', 'qwen2.5'),
            'messages' => [
                ['role' => 'user', 'content' => $message],
            ],
            'options' => array_merge($this->defaultOptions, $options['options'] ?? []),
            'stream' => $options['stream'] ?? false,
        ];

        if (isset($options['think'])) {
            $payload['think'] = $options['think'];
        }

        try {
            $response = $this->client->post('/api/chat', ['json' => $payload]);
            $data = json_decode($response->getBody()->getContents(), true);

            return [
                'content' => $data['message']['content'] ?? '',
                'thinking' => $data['message']['thinking'] ?? null,
                'done' => $data['done'] ?? false,
                'tokens' => [
                    'prompt' => $data['prompt_eval_count'] ?? 0,
                    'generated' => $data['eval_count'] ?? 0,
                    'total' => ($data['prompt_eval_count'] ?? 0) + ($data['eval_count'] ?? 0),
                ],
                'duration' => [
                    'total' => $data['total_duration'] ?? 0,
                    'prompt' => $data['prompt_eval_duration'] ?? 0,
                    'generation' => $data['eval_duration'] ?? 0,
                ],
            ];
        } catch (GuzzleException $e) {
            Log::error('Ollama Chat API error', ['error' => $e->getMessage()]);
            throw new Exception('Ollama API error: ' . $e->getMessage());
        }
    }

    public function executeOptimized(string $message): array
    {
        return $this->execute($message, [
            'options' => [
                'num_predict' => 256,
                'temperature' => 0.3,
                'top_k' => 20,
                'top_p' => 0.7,
                'num_ctx' => 1024,
            ],
            'think' => 'low',
        ]);
    }

    public function executeMinimal(string $message): array
    {
        return $this->execute($message, [
            'options' => [
                'num_predict' => 128,
                'temperature' => 0.1,
                'top_k' => 10,
                'top_p' => 0.5,
                'num_ctx' => 512,
            ],
            'think' => 'low',
        ]);
    }
}
