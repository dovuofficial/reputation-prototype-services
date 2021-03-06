<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'auth_profile_edit',
            ],
            [
                'id'    => 2,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 3,
                'title' => 'permission_create',
            ],
            [
                'id'    => 4,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 5,
                'title' => 'permission_show',
            ],
            [
                'id'    => 6,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 7,
                'title' => 'permission_access',
            ],
            [
                'id'    => 8,
                'title' => 'role_create',
            ],
            [
                'id'    => 9,
                'title' => 'role_edit',
            ],
            [
                'id'    => 10,
                'title' => 'role_show',
            ],
            [
                'id'    => 11,
                'title' => 'role_delete',
            ],
            [
                'id'    => 12,
                'title' => 'role_access',
            ],
            [
                'id'    => 13,
                'title' => 'user_create',
            ],
            [
                'id'    => 14,
                'title' => 'user_edit',
            ],
            [
                'id'    => 15,
                'title' => 'user_show',
            ],
            [
                'id'    => 16,
                'title' => 'user_delete',
            ],
            [
                'id'    => 17,
                'title' => 'user_access',
            ],
            [
                'id'    => 18,
                'title' => 'project_create',
            ],
            [
                'id'    => 19,
                'title' => 'project_edit',
            ],
            [
                'id'    => 20,
                'title' => 'project_show',
            ],
            [
                'id'    => 21,
                'title' => 'project_access',
            ],
            [
                'id'    => 22,
                'title' => 'staked_tokens_to_project_create',
            ],
            [
                'id'    => 23,
                'title' => 'staked_tokens_to_project_edit',
            ],
            [
                'id'    => 24,
                'title' => 'staked_tokens_to_project_show',
            ],
            [
                'id'    => 25,
                'title' => 'staked_tokens_to_project_access',
            ],
            [
                'id'    => 26,
                'title' => 'dao_insurance_proposal_create',
            ],
            [
                'id'    => 27,
                'title' => 'dao_insurance_proposal_edit',
            ],
            [
                'id'    => 28,
                'title' => 'dao_insurance_proposal_show',
            ],
            [
                'id'    => 29,
                'title' => 'dao_insurance_proposal_delete',
            ],
            [
                'id'    => 30,
                'title' => 'dao_insurance_proposal_access',
            ],
            [
                'id'    => 31,
                'title' => 'token_claiming_access',
            ],
            [
                'id'    => 32,
                'title' => 'max_claimable_token_create',
            ],
            [
                'id'    => 33,
                'title' => 'max_claimable_token_edit',
            ],
            [
                'id'    => 34,
                'title' => 'max_claimable_token_show',
            ],
            [
                'id'    => 35,
                'title' => 'max_claimable_token_access',
            ],
            [
                'id'    => 36,
                'title' => 'account_token_claim_create',
            ],
            [
                'id'    => 37,
                'title' => 'account_token_claim_edit',
            ],
            [
                'id'    => 38,
                'title' => 'account_token_claim_show',
            ],
            [
                'id'    => 39,
                'title' => 'account_token_claim_access',
            ],
        ];

        Permission::insert($permissions);
    }
}
