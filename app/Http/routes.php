<?php
/**
 * this source file is routes.php
 *
 * author: shuc <shuc324@gmail.com>
 * time:   2016-04-10 11-51
 */
use App\Utils\Helper;
use App\Http\Responses\Status;
use App\Http\Responses\Response;
use App\Http\Services\Reception\UserService;

$app->get('/', function () use ($app) {
    return response(Response::out(Status::SUCCESS, ['site' => 'bileji service!']));
});

# 1.0 版前台rpc service
$app->group(['prefix' => 'rpc/v1.0/reception'], function () use ($app) {
    # 用户
    $app->post('user', function (UserService $service) {
        return Helper::attachService($service);
    });
});