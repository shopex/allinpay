# allinpay
通联支付 version 2.1.2

### 配置要求
```
"php": ">=7.1",
"monolog/monolog": "^1.23"
```
### 安装
```bash
composer require onex/allinpay
```
### 配置文件
```
return [
    /** - 必填配置` - **/
    // 商户ID
    'sysid' => env('ALLINPAY_SYSID', '1902271423530xxxxxxx'),
    // 接口地址
    'server_url' => env('ALLINPAY_SERVER_URL', 'http://xxx.xxx.xxx.xxx:xxxx/service/soa'),
    // 商户私钥
    'private_key_path' => env('ALLINPAY_PRIVATE_KEY_PATH', storage_path('allinpay_cert/1902271423530xxxxx.pfx')),
    // 商户私钥
    'tl_cert_path' => env('ALLINPAY_TL_CERT_PATH', storage_path('allinpay_cert/19022714235304xxxxx.cer')),
    // 用户密码
    'private_password' => env('ALLINPAY_PRIVATE_PASSWORD', '123456'),
    // 版本
    'version' => env('ALLINPAY_VERSION', '2.1.2'),
    // 日志
    'log_path' => env('ALLINPAY_VERSION', storage_path('logs/tonglian.log')),
];

```
### 普通使用
```php
// 普通调用
$merchantRequest = new Onex\Allinpay\Requests\MerchantRequest();
$merchantRequest->setSysid(null);
$merchantService = new \Onex\Allinpay\Port\MerchantService($allinpay, $merchantRequest);
$respone = $merchantService->queryReserveFundBalance()
var_dump($respone);
/* 
return array(5) {
  ["status"]=>
  string(7) "success"
  ["status_code"]=>
  int(200)
  ["error"]=>
  int(0)
  ["code"]=>
  int(0)
  ["data"]=>
  array(4) {
    ["sysid"]=>
    string(19) "1902271423530473681"
    ["sign"]=>
    string(172) "CB6v9E9tkgb30gRuCTBYatEh/9o0KT63DZyUSz+0wugViLTNY5Apu9Q8ocBnYNafRX9mRXloqGoaFhEu4gdfZu761FMHPZghOZZsJmKsTx8abx5DEv4gPGpYLcPb0taALuGBOz+f8h6Nhyhjaycct209sFX+lhTx+pla2Ek8Uvw="
    ["signedValue"]=>
    string(102) "{"balance":0,"account_name":"yuntest20181121-退款户","account_no":"200604000005721000","def_clr":0}"
    ["status"]=>
    string(2) "OK"
  }
}
*/
```
### laravel 使用
laravel 将服务提供者添加到`config/app.php`
```
Onex\Allinpay\Providers\AllinpayApiProvider::class
```
lumen 将服务提供者添加到`bootstrap/app.php`
```
$app->register(Canren\Mongodb\MongoServiceProvider::class);
```
```php
// 普通调用
app('allinpay.merchant.request')->setSysid(null);
$respone = app('allinpay')->merchant()->queryReserveFundBalance()
var_dump($respone);
/* 
return array(5) {
  ["status"]=>
  string(7) "success"
  ["status_code"]=>
  int(200)
  ["error"]=>
  int(0)
  ["code"]=>
  int(0)
  ["data"]=>
  array(4) {
    ["sysid"]=>
    string(19) "1902271423530473681"
    ["sign"]=>
    string(172) "CB6v9E9tkgb30gRuCTBYatEh/9o0KT63DZyUSz+0wugViLTNY5Apu9Q8ocBnYNafRX9mRXloqGoaFhEu4gdfZu761FMHPZghOZZsJmKsTx8abx5DEv4gPGpYLcPb0taALuGBOz+f8h6Nhyhjaycct209sFX+lhTx+pla2Ek8Uvw="
    ["signedValue"]=>
    string(102) "{"balance":0,"account_name":"yuntest20181121-退款户","account_no":"200604000005721000","def_clr":0}"
    ["status"]=>
    string(2) "OK"
  }
}
*/
```