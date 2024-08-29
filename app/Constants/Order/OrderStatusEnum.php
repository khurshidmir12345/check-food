<?php

namespace App\Constants\Order;

enum OrderStatusEnum: string {
    case PENDING = 'pending';
    case DONE = 'done';
    case CANCELED = 'canceled';
}
