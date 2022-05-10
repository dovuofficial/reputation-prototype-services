<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('maxClaimableToken.max_tokens') ? 'invalid' : '' }}">
        <label class="form-label required" for="max_tokens">{{ trans('cruds.maxClaimableToken.fields.max_tokens') }}</label>
        <input class="form-control" type="number" name="max_tokens" id="max_tokens" required wire:model.defer="maxClaimableToken.max_tokens" step="1">
        <div class="validation-message">
            {{ $errors->first('maxClaimableToken.max_tokens') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.maxClaimableToken.fields.max_tokens_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.max-claimable-tokens.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>