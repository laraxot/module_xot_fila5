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
<<<<<<< .merge_file_0WgkJo
     * @param  Collection<int, Model>  $records
=======
     * <<<<<<< .merge_file_jHRYFu.
     *
     * @param Collection<int, Model> $records
     *                                        =======
     *                                        <<<<<<< HEAD
     * @param Collection<int, Model> $records
     *                                        =======
     * @param Collection<int, Model> $records
     *                                        >>>>>>> laraxot/dev
     *                                        >>>>>>> .merge_file_CEjyJs
>>>>>>> .merge_file_CFlUJD
     */
    public function execute(Collection $records, string $mail_class): bool
    {
        foreach ($records as $record) {
            app(SendMailByRecordAction::class)->execute($record, $mail_class);
        }

        return true;
    }
}
