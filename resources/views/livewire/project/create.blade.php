<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('project.name') ? 'invalid' : '' }}">
        <label class="form-label required" for="name">{{ trans('cruds.project.fields.name') }}</label>
        <input class="form-control" type="text" name="name" id="name" required wire:model.defer="project.name">
        <div class="validation-message">
            {{ $errors->first('project.name') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.project.fields.name_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('project.image') ? 'invalid' : '' }}">
        <label class="form-label required" for="image">{{ trans('cruds.project.fields.image') }}</label>
        <input class="form-control" type="text" name="image" id="image" required wire:model.defer="project.image">
        <div class="validation-message">
            {{ $errors->first('project.image') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.project.fields.image_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('project.price_kg') ? 'invalid' : '' }}">
        <label class="form-label" for="price_kg">{{ trans('cruds.project.fields.price_kg') }}</label>
        <input class="form-control" type="number" name="price_kg" id="price_kg" wire:model.defer="project.price_kg" step="0.01">
        <div class="validation-message">
            {{ $errors->first('project.price_kg') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.project.fields.price_kg_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('project.verified_kg') ? 'invalid' : '' }}">
        <label class="form-label" for="verified_kg">{{ trans('cruds.project.fields.verified_kg') }}</label>
        <input class="form-control" type="number" name="verified_kg" id="verified_kg" wire:model.defer="project.verified_kg" step="1">
        <div class="validation-message">
            {{ $errors->first('project.verified_kg') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.project.fields.verified_kg_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('project.collateral_risk') ? 'invalid' : '' }}">
        <label class="form-label" for="collateral_risk">{{ trans('cruds.project.fields.collateral_risk') }}</label>
        <input class="form-control" type="text" name="collateral_risk" id="collateral_risk" wire:model.defer="project.collateral_risk">
        <div class="validation-message">
            {{ $errors->first('project.collateral_risk') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.project.fields.collateral_risk_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('project.staked_tokens') ? 'invalid' : '' }}">
        <label class="form-label" for="staked_tokens">{{ trans('cruds.project.fields.staked_tokens') }}</label>
        <input class="form-control" type="number" name="staked_tokens" id="staked_tokens" wire:model.defer="project.staked_tokens" step="1">
        <div class="validation-message">
            {{ $errors->first('project.staked_tokens') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.project.fields.staked_tokens_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('project.unlock_at') ? 'invalid' : '' }}">
        <label class="form-label" for="unlock_at">{{ trans('cruds.project.fields.unlock_at') }}</label>
        <input class="form-control" type="text" name="unlock_at" id="unlock_at" wire:model.defer="project.unlock_at">
        <div class="validation-message">
            {{ $errors->first('project.unlock_at') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.project.fields.unlock_at_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('project.days_remaining') ? 'invalid' : '' }}">
        <label class="form-label" for="days_remaining">{{ trans('cruds.project.fields.days_remaining') }}</label>
        <input class="form-control" type="number" name="days_remaining" id="days_remaining" wire:model.defer="project.days_remaining" step="1">
        <div class="validation-message">
            {{ $errors->first('project.days_remaining') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.project.fields.days_remaining_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>