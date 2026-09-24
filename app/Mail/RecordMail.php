<?php

declare(strict_types=1);

namespace Modules\Xot\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

/**
 * Class RecordMail.
 *
 * Mailable per l'invio di dati di record via email.
 */
class RecordMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    /**
     * @var array<string, mixed>
     */
    public array $recordData;

    /**
     * Crea una nuova istanza del mailable.
     *
<<<<<<< .merge_file_kWGa6f
<<<<<<< HEAD
<<<<<<< HEAD
     * @param  array<string, mixed>  $data  I dati del record
=======
     * @param array<string, mixed> $data I dati del record
>>>>>>> laraxot/dev
=======
     * @param array<string, mixed> $data I dati del record
>>>>>>> 8d801bbe (Check & fix styling)
=======
     * @param  array<string, mixed>  $data  I dati del record
>>>>>>> .merge_file_jpVzHi
     */
    public function __construct(array $data)
    {
        $this->recordData = $data;
    }

    /**
     * Costruisce il messaggio.
     *
     * @return $this
     */
    public function build(): self
    {
<<<<<<< .merge_file_kWGa6f
<<<<<<< HEAD
<<<<<<< HEAD
=======
        /* @phpstan-ignore argument.type (view-string not resolved for module views) */
>>>>>>> laraxot/dev
=======
>>>>>>> 8d801bbe (Check & fix styling)
        return $this->view('xot::emails.record')->with(['data' => $this->recordData]);
=======
        /** @var view-string $view */
        $view = 'xot::emails.record';

        return $this->view($view)->with(['data' => $this->recordData]);
>>>>>>> .merge_file_jpVzHi
    }
}
