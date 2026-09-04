<?php

namespace App\Enums;

enum RoomType: string
{
    case Bedspace = 'bedspace';
    case Partition = 'partition';
    case SharedRoom = 'shared_room';
    case PrivateRoom = 'private_room';
    case Studio = 'studio';

    public function label(): string
    {
        return match ($this) {
            self::Bedspace => 'Bedspace',
            self::Partition => 'Partition',
            self::SharedRoom => 'Shared Room',
            self::PrivateRoom => 'Private Room',
            self::Studio => 'Studio',
        };
    }
}
