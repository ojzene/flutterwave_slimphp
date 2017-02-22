<?php
if ($mode == 'production' || $mode == 'debug')
{
    $app->group('/v1', function () use ($app){

        $app->post('/banks', 'PayController:getBanks');
        $app->post('/token', 'PayController:getToken');
        $app->post('/transfer/card', 'PayController:cardToAccount');
        $app->post('/transfer/wallet', 'PayController:cardToWallet');
        $app->post('/charge/total', 'PayController:totalChargeToCard');
        $app->post('/disburse/single', 'PayController:walletToAccountSingle');
        $app->post('/disburse/bulk', 'PayController:walletToAccountBulk');
        $app->post('/account/validate', 'PayController:accountNumberValidate');
        $app->post('/transfer/disburse/retry', 'PayController:failedTransactionRetry');
        $app->post('/transfer/{id}', 'PayController:transCardToAccount');
        $app->post('/disburse/status', 'PayController:transWalletToAccount');
        $app->get('/wallet', 'PayController:walletBalance');

        $app->get('/redirectpage', 'PayController:getBanks');

    });
}
