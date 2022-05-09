<form wire:submit.prevent="submit" class="pt-3">

    <div class="form-group {{ $errors->has('daoInsuranceProposal.project_id') ? 'invalid' : '' }}">
        <label class="form-label required" for="project">{{ trans('cruds.daoInsuranceProposal.fields.project') }}</label>
        <x-select-list class="form-control" required id="project" name="project" :options="$this->listsForFields['project']" wire:model="daoInsuranceProposal.project_id" />
        <div class="validation-message">
            {{ $errors->first('daoInsuranceProposal.project_id') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.daoInsuranceProposal.fields.project_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('daoInsuranceProposal.description') ? 'invalid' : '' }}">
        <label class="form-label required" for="description">{{ trans('cruds.daoInsuranceProposal.fields.description') }}</label>
        <input class="form-control" type="text" name="description" id="description" required wire:model.defer="daoInsuranceProposal.description">
        <div class="validation-message">
            {{ $errors->first('daoInsuranceProposal.description') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.daoInsuranceProposal.fields.description_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('daoInsuranceProposal.percentage') ? 'invalid' : '' }}">
        <label class="form-label required" for="percentage">{{ trans('cruds.daoInsuranceProposal.fields.percentage') }}</label>
        <input class="form-control" type="number" name="percentage" id="percentage" required wire:model.defer="daoInsuranceProposal.percentage" step="1">
        <div class="validation-message">
            {{ $errors->first('daoInsuranceProposal.percentage') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.daoInsuranceProposal.fields.percentage_helper') }}
        </div>
    </div>
    <div class="form-group {{ $errors->has('daoInsuranceProposal.has_liquidated') ? 'invalid' : '' }}">
        <input class="form-control" type="checkbox" name="has_liquidated" id="has_liquidated" wire:model.defer="daoInsuranceProposal.has_liquidated">
        <label class="form-label inline ml-1" for="has_liquidated">{{ trans('cruds.daoInsuranceProposal.fields.has_liquidated') }}</label>
        <div class="validation-message">
            {{ $errors->first('daoInsuranceProposal.has_liquidated') }}
        </div>
        <div class="help-block">
            {{ trans('cruds.daoInsuranceProposal.fields.has_liquidated_helper') }}
        </div>
    </div>

    <div class="form-group">
        <button class="btn btn-indigo mr-2" type="submit">
            {{ trans('global.save') }}
        </button>
        <a href="{{ route('admin.dao-insurance-proposals.index') }}" class="btn btn-secondary">
            {{ trans('global.cancel') }}
        </a>
    </div>
</form>