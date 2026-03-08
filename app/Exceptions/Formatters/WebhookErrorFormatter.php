<?php

declare(strict_types=1);

namespace Modules\Xot\Exceptions\Formatters;

use Illuminate\Support\Facades\Auth;

class WebhookErrorFormatter
{
    public function __construct(
        private \Throwable $exception,
    ) {
    }

    /**
     * @return array<string, mixed>
     */
    public function format(): array
    {
        $user = Auth::user();
        $email = $user->email ?? 'CLI User';

        return [
            'message' => // @var mixed exception->getMessage(
            'file' => // @var mixed exception->getFile(
            'line' => // @var mixed exception->getLine(
            'trace' => // @var mixed exception->getTraceAsString(
            'exception' => sprintf('`%s` (Code `%s`)', get_class(// @var mixed exception
            'thrown_in' => sprintf('`%s`:%d', // @var mixed exception->getFile(
            'user' => sprintf('%d <%s>', Auth::id() ?? 0, $email),
            'ip' => request()->ip(),
            'thrown_while_calling' => sprintf('[%s] %s', request()->getMethod(), request()->fullUrl()),
            'url_previous' => url()->previous(),
            /*
             * 'exception_details' => sprintf(
             * "Trace:\n```json \n %s \n ```\n\n Previous: \n `%s`",
             * json_encode(// @var mixed exception->getTrace(
             * // @var mixed exception->getPrevious(
             * ),
             */
        ];
    }
}
