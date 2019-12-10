<?php

namespace Onex\Allinpay\Helper;

use Monolog\Formatter\LineFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;

class Tools
{
    /**
     * 写入成功返回
     *
     * @param string $message 成功信息
     * @param int $code
     * @param array $data
     * @return array
     */
    public static function success($message = '写入成功', $code = 0, $data = [])
    {
        if (defined('ERROR_CODE')) $code = ERROR_CODE;
        $response = [
            'status' => 'success',
            'status_code' => 200,
            'error' => 0,
            'code' => $code,
            'message' => $message
        ];
        if (!empty($data)) $response = array_merge($response, ['data' => $data]);
        return $response;
    }

    /**
     * 写入成功返回
     *
     * @param array $data
     * @param int $code
     * @return array
     */
    public static function setData($data = [], $code = 0)
    {
        if (defined('ERROR_CODE')) $code = ERROR_CODE;
        $response = [
            'status' => 'success',
            'status_code' => 200,
            'error' => 0,
            'code' => $code,
            'data' => $data
        ];
        return $response;
    }

    /**
     * 写入失败返回
     *
     * @param string $message 错误信息
     * @param int $code
     * @return array
     */
    public static function error($message = '写入失败', $code = 0, $data = [])
    {
        if (defined('ERROR_CODE')) $code = ERROR_CODE;
        $response = [
            'status' => 'failed',
            'status_code' => 500,
            'error' => 1,
            'code' => $code,
            'message' => $message
        ];
        if (!empty($data)) $response = array_merge($response, ['data' => $data]);
        return $response;
    }

    /**
     * 设置日志文件名
     *
     * @param string $logPath
     * @param string $fileName
     * @param $bugLevel
     * @return Logger
     * @throws \Exception
     */
    public static function setFileName(string $logPath, $fileName = 'tonglian', $bugLevel = Logger::DEBUG)
    {
        if (!$logPath) die('请配置日志');
        $stream = new StreamHandler($logPath, $bugLevel);
        $stream->setFormatter(new LineFormatter(null, null, true, true));
        $log = new Logger($fileName);
        $log->pushHandler($stream);

        return $log;
    }

    /**
     * 成功日志信息输出
     *
     * @param string $logPath 日志路径
     * @param array $content 日志信息
     * @param null $title 日志title
     * @param string $fileName 日志文件名
     * @throws \Exception
     */
    public static function logInfo(string $logPath, array $content, $title = null, $fileName = 'tonglian')
    {
        if (env('LOG_ON', true)) {
            $log = self::setFileName($logPath, $fileName, Logger::INFO);
            if ($title) $log->info($title);
            $log->info('==========================');
            $log->info(print_r($content, true));
            $log->info('==========================');
        }
    }

    /**
     * 错误日志输出
     *
     * @param string $logPath 日志路径
     * @param array $content 日志信息
     * @param null $title 日志title
     * @param string $fileName 日志文件名
     * @throws \Exception
     */
    public static function logError($logPath, $content, $title = null, $fileName = 'tonglian')
    {
        $log = self::setFileName($logPath, $fileName, Logger::ERROR);
        if ($title) $log->info($title);
        $log->error('**************************');
        $log->error($content);
        $log->error('**************************');
    }

}
