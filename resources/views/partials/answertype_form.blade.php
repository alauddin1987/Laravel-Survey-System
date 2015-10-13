<div class="form-group has-feedback">

	<div class="form-group">
		<label>Answer Type</label>

		<div class="input-group col-md-12">					
			<input type="text" class="form-control pull-right" name="name" value="{{ isset($answertype) ? $answertype->name : '' }}" >
		</div>
		<!-- /.input group -->
	</div>

	<div class="box-footer">
		<button class="btn btn-primary" type="submit">Submit</button>
	</div>
</div>