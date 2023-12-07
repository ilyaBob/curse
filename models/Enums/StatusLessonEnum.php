<?php

namespace app\models\Enums;

class StatusLessonEnum
{
    public const COMPLETED = 1;
    public const ALLOW = 2;
    public const CLOSED = 3;

    public function getStatusList(): array
    {
        return [
            self::COMPLETED => 'Пройден',
            self::ALLOW => 'Разрешён',
            self::CLOSED => 'Закрыт',
        ];
    }
}