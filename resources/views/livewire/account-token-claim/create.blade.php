<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('accountTokenClaim.hedera_account') ? 'invalid' : '' }}">
        <label class="form-label required" for="hedera_account">{{ trans('cruds.accountTokenClaim.fields.hedera_account') }}</label>
        <input class="form-control" type="text" name="hedera_account" id="hedera_account" required wire:model.defer="accountTokenClaim.hedera_account">
        <div class="validation-message">
            {{ $errors->first('accountTokenClaim.hedera_account') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.accountTokenClaim.fields.hedera_account_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('accountTokenClaim.amount') ? 'invalid' : '' }}">
        <label class="form-label" for="amount">{{ trans('cruds.accountTokenClaim.fields.amount') }}</label>
        <input class="form-control" type="number" name="amount" id="amount" wire:model.defer="accountTokenClaim.amount" step="1">
        <div class="validation-message">
            {{ $errors->first('accountTokenClaim.amount') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.accountTokenClaim.fields.amount_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.account-token-claims.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>