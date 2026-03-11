<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\AI\Ollama;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Log;
use Spatie\QueueableAction\QueueableAction;

class GenerateOllamaAction
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

    public function execute(string $prompt, array $options = []): array
    {
        $payload = [
            'model' => $options['model'] ?? config('services.ollama.model', 'qwen2.5'),
            'prompt' => $prompt,
            'options' => array_merge($this->defaultOptions, $options['options'] ?? []),
            'stream' => $options['stream'] ?? false,
        ];

        try {
            $response = $this->client->post('/api/generate', ['json' => $payload]);
            $data = json_decode($response->getBody()->getContents(), true);

            return [
                'response' => $data['response'] ?? '',
                'done' => $data['done'] ?? false,
                'tokens' => [
                    'prompt' => $data['prompt_eval_count'] ?? 0,
                    'generated' => $data['eval_count'] ?? 0,
                ],
            ];
        } catch (GuzzleException $e) {
            Log::error('Ollama Generate API error', ['error' => $e->getMessage()]);
            throw new \Exception('Ollama API error: '.$e->getMessage());
        }
    }

    public function executeOptimized(string $prompt): array
    {
        return $this->execute($prompt, [
            'options' => [
                'num_predict' => 256,
                'temperature' => 0.3,
                'top_k' => 20,
                'top_p' => 0.7,
            ],
        ]);
    }

    public function executeMinimal(string $prompt): array
    {
        return $this->execute($prompt, [
            'options' => [
                'num_predict' => 128,
                'temperature' => 0.1,
                'top_k' => 10,
                'top_p' => 0.5,
            ],
        ]);
    }
}
