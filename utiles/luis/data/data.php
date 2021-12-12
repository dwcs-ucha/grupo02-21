<?php
/**
 * Consumo del Bitcoin en Wh
 * 
 * Estimación de 201.32 TWh al año
 * @source https://digiconomist.net/bitcoin-energy-consumption/
 */
//$bitcoin_Wh = 22981735159.81735;
//$bitcoin_dec = $bitcoin_Wh / 36000;

/**
 * Consumo en TWh anuales de criptomonedas en 2020.
 * 
 * @source https://www.moneysupermarket.com/gas-and-electricity/features/crypto-energy-consumption/?__cf_chl_jschl_tk__=_9RX2AXd2syGajEh89l8ZlFPd7m9CTgURHpBM97Zc_Y-1639261331-0-gaNycGzNCGU
 */

 $bitcoin = 123.75;
 $ethereum = 39.19;
 $bitcoin_cash = 0.88;
 $litecoin = 0.62;
 $ethereum2 = 0.39;
 $cardano = 0.01;
 $dogecoin = 0.002;
 $xrp = 0.0005;
 
 $bitcoin_Wh = transformToWh($bitcoin);
 $ethereum_Wh = transformToWh($ethereum);
 $bitcoin_cash_Wh = transformToWh($bitcoin_cash);
 $litecoin_Wh = transformToWh($litecoin);
 $ethereum2_Wh = transformToWh($ethereum2);
 $cardano_Wh = transformToWh($cardano);
 $dogecoin_Wh = transformToWh($dogecoin);
 $xrp_Wh = transformToWh($xrp);

 $currency = [$bitcoin_Wh, $ethereum_Wh, $bitcoin_cash_Wh, $litecoin_Wh, $ethereum2_Wh, $cardano_Wh, $dogecoin_Wh, $xrp_Wh];

 function transformToWh($consumption) {
    $consumption = $consumption / 365;
    $consumption = $consumption / 24;

    $consumption = $consumption * 1000;
    $consumption = $consumption * 1000;
    $consumption = $consumption * 1000;
    $consumption = $consumption * 1000;

    return $consumption;
 }
?>
