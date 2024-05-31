<?php
namespace App\Enums;

enum TransactionStatusEnum: string
{
    case Payment_was_successful = 'Payment was successful';
    case Payment_was_cancelled = 'payment was cancelled';
    case Pending = 'pending';
    case Shopping = 'shopping';
}
