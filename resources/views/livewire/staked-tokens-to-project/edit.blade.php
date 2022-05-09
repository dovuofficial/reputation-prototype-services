<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('stakedTokensToProject.project_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="project">{{ trans('cruds.stakedTokensToProject.fields.project') }}</label>
        <x-select-list class="form-control" required id="project" name="project" :options="$this->listsForFields['project']" wire:model="stakedTokensToProject.project_id" />
        <div class="validation-message">
            {{ $errors->first('stakedTokensToProject.project_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.stakedTokensToProject.fields.project_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('stakedTokensToProject.hedera_account') ? 'invalid' : '' }}">
        <label class="form-label required" for="hedera_account">{{ trans('cruds.stakedTokensToProject.fields.hedera_account') }}</label>
        <input class="form-control" type="text" name="hedera_account" id="hedera_account" required wire:model.defer="stakedTokensToProject.hedera_account">
        <div class="validation-message">
            {{ $errors->first('stakedTokensToProject.hedera_account') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.stakedTokensToProject.fields.hedera_account_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('stakedTokensToProject.dov_staked') ? 'invalid' : '' }}">
        <label class="form-label required" for="dov_staked">{{ trans('cruds.stakedTokensToProject.fields.dov_staked') }}</label>
        <input class="form-control" type="number" name="dov_staked" id="dov_staked" required wire:model.defer="stakedTokensToProject.dov_staked" step="1">
        <div class="validation-message">
            {{ $errors->first('stakedTokensToProject.dov_staked') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.stakedTokensToProject.fields.dov_staked_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('stakedTokensToProject.surrendered_dov') ? 'invalid' : '' }}">
        <label class="form-label" for="surrendered_dov">{{ trans('cruds.stakedTokensToProject.fields.surrendered_dov') }}</label>
        <input class="form-control" type="number" name="surrendered_dov" id="surrendered_dov" wire:model.defer="stakedTokensToProject.surrendered_dov" step="1">
        <div class="validation-message">
            {{ $errors->first('stakedTokensToProject.surrendered_dov') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.stakedTokensToProject.fields.surrendered_dov_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.staked-tokens-to-projects.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>