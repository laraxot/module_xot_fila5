<?php

declare(strict_types=1);

namespace Modules\Xot\Actions\Mail;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Spatie\QueueableAction\QueueableAction;

class SendMailByRecordsAction
{
    use QueueableAction;

    /**
<<<<<<< .merge_file_3K7wLK
<<<<<<< HEAD
     * <<<<<<< HEAD.
     *
     * @param Collection<int, Model> $records
     *                                        =======
     * @param Collection<int, Model> $records
     *                                        >>>>>>> laraxot/dev
=======
     * @param Collection<int, Model> $records
>>>>>>> 3792da0d (Check & fix styling)
=======
     * @param  Collection<int, Model>  $records
>>>>>>> .merge_file_x8z9Iw
     */
    public function execute(Collection $records, string $mail_class): bool
    {
        foreach ($records as $record) {
            app(SendMailByRecordAction::class)->execute($record, $mail_class);
        }

        return true;
    }
}
