<?php

namespace App\Domain\Response;

class ApiResponse
{
    /**
     * Отображатель данных,
     * @param object|array|string $data
     */
    public function show(object|array|string $data): void
    {
        switch (gettype($data)) {
            case 'array':
                echo json_encode($data, true);
                break;
            case 'string':
                echo '{ "response":' . $data . '}';
                break;
            case 'object':
                echo json_encode($data->toArray(), true);
                break;
        }
    }
}
