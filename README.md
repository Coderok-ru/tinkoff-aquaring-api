# Tinkoff bank acquiring library.
Библиотека для приема платежей через интернет для Тинькофф банк.

### Возможности

 * Генерация URL для оплаты товаров
 * Подттверждение платежа
 * Просмотр статуса платжа
 * Отмена платежа

### Установка

С помощью [Composer](https://getcomposer.org/):

```bash
composer require coderok/tinkoff-aquaring
```

Подключение в контроллере:

```php
use Coderok\TinkoffAquaring;
```

## Примеры использования
### 1. Инициализация

```php
$api = new TinkoffAquaring(
    'xxxxxxxxxxxxxxxxx',  //Ваш Terminal_Key
    'xxxxxxxxxxxxxxxxx'   //Ваш Secret_Key
);
```

### 2. Получить URL для оплаты
```php
//Подготовка массива с данными об оплате
    $email = 'test@test.com';
    $emailCompany = 'testCompany@test.com';
    $phone = '89179990000';

    $taxations = [
        'osn'                => 'osn',                // Общая СН
        'usn_income'         => 'usn_income',         // Упрощенная СН (доходы)
        'usn_income_outcome' => 'usn_income_outcome', // Упрощенная СН (доходы минус расходы)
        'envd'               => 'envd',               // Единый налог на вмененный доход
        'esn'                => 'esn',                // Единый сельскохозяйственный налог
        'patent'             => 'patent'              // Патентная СН
    ];

    $paymentMethod = [
        'full_prepayment' => 'full_prepayment', //Предоплата 100%
        'prepayment'      => 'prepayment',      //Предоплата
        'advance'         => 'advance',         //Аванc
        'full_payment'    => 'full_payment',    //Полный расчет
        'partial_payment' => 'partial_payment', //Частичный расчет и кредит
        'credit'          => 'credit',          //Передача в кредит
        'credit_payment'  => 'credit_payment',  //Оплата кредита
    ];

    $paymentObject = [
        'commodity'             => 'commodity',             //Товар
        'excise'                => 'excise',                //Подакцизный товар
        'job'                   => 'job',                   //Работа
        'service'               => 'service',               //Услуга
        'gambling_bet'          => 'gambling_bet',          //Ставка азартной игры
        'gambling_prize'        => 'gambling_prize',        //Выигрыш азартной игры
        'lottery'               => 'lottery',               //Лотерейный билет
        'lottery_prize'         => 'lottery_prize',         //Выигрыш лотереи
        'intellectual_activity' => 'intellectual_activity', //Предоставление результатов интеллектуальной деятельности
        'payment'               => 'payment',               //Платеж
        'agent_commission'      => 'agent_commission',      //Агентское вознаграждение
        'composite'             => 'composite',             //Составной предмет расчета
        'another'               => 'another',               //Иной предмет расчета
    ];

    $vats = [
        'none'  => 'none', // Без НДС
        'vat0'  => 'vat0', // НДС 0%
        'vat10' => 'vat10', // НДС 10%
        'vat20' => 'vat20' // НДС 20%
    ];

    $enabledTaxation = true;
    $amount = 1000 * 100;

    $receiptItem = [[
        'Name'          => 'product1',
        'Price'         => 200 * 100,
        'Quantity'      => 2,
        'Amount'        => 200 * 2 * 100,
        'PaymentMethod' => $paymentMethod['full_prepayment'],
        'PaymentObject' => $paymentObject['service'],
        'Tax'           => $vats['none']
    ], [
        'Name'          => 'product2',
        'Price'         => 500 * 100,
        'Quantity'      => 1,
        'Amount'        => 500 * 100,
        'PaymentMethod' => $paymentMethod['full_prepayment'],
        'PaymentObject' => $paymentObject['service'],
        'Tax'           => $vats['vat10']
    ], [
        'Name'          => 'shipping',
        'Price'         => 100 * 100,
        'Quantity'      => 1,
        'Amount'        => 100 * 100,
        'PaymentMethod' => $paymentMethod['full_prepayment'],
        'PaymentObject' => $paymentObject['service'],
        'Tax'           => $vats['vat20'],
    ]];

//подготовка массива с покупками
    $receipt = [
        'EmailCompany' => $emailCompany,
        'Email'        => $email,
        'Taxation'     => $taxations['osn'],
        'Items'        => balanceAmount($isShipping, $receiptItem, $amount),
    ];

//Получение url для оплаты
$params = [
                    'OrderId' => 200001,
                    'Amount'  => $amount,
                    'DATA'    => [
                        'Email'           => $email,
                        'Connection_type' => 'example'
                    ],
                ];

                if ($enabledTaxation) {
                    $params['Receipt'] = $receipt;
                }

                $api->init($params);
```

### 3. Получить статус платежа

    $params = [
         'PaymentId' => '1816627256',
    ];
    
    $api->getState($params);
                

---

