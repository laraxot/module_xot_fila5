<?php

declare(strict_types=1);
<<<<<<< HEAD

=======
>>>>>>> laraxot/dev
?>
<table border="1" class="table table-bordered">
@foreach ($rows as $row)
    <tr>
        @foreach ($row as $cell)
            <td>{{ is_string($cell)?$cell:'--NOT STRING--' }}</td>
        @endforeach
    </td>
@endforeach
</table>
