<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Mail;

use Illuminate\Database\Eloquent\Collection;
<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Model;
>>>>>>> c7fd73eb (.)
use Spatie\QueueableAction\QueueableAction;

class SendMailByRecordsAction
{
    use QueueableAction;

    /**
<<<<<<< HEAD
     * Undocumented function.
     *
     * @return bool
     */
    public function execute(Collection $records, string $mail_class)
=======
     * @param Collection<int, Model> $records
     */
    public function execute(Collection $records, string $mail_class): bool
>>>>>>> c7fd73eb (.)
    {
        foreach ($records as $record) {
            app(SendMailByRecordAction::class)->execute($record, $mail_class);
        }

        return true;
    }
}
