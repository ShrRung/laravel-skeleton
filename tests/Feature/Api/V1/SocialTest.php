<?php
/**
 * This is NOT a freeware, use is subject to license terms
 * @copyright Copyright (c) 2010-2099 Jinan Larva Information Technology Co., Ltd.
 * @link http://www.larva.com.cn/
 * @license http://www.larva.com.cn/license/
 */

namespace Tests\Feature\Api\V1;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Passport\Passport;
use Tests\TestCase;

/**
 * Class SocialTest
 *
 * @author Tongle Xu <xutongle@gmail.com>
 */
class SocialTest extends TestCase
{
    use RefreshDatabase;

    /**
     * 获取绑定的社交账户
     */
    public function testSocialAccounts()
    {
        $user = factory(\App\Models\User::class)->create();
        Passport::actingAs($user);
        $response = $this->json('GET', url('api/v1/user/social/accounts'));
        $response->assertStatus(200);
    }


}
