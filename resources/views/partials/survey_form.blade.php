<div class="form-group has-feedback">

			<div class="form-group">
				<label>Category</label>

				{!!
					Form::select('category_id', $category_list, 
						isset($survey) ? $survey->category_id : '', array('class' => 'form-control select2'))
						!!}
						
					</div>

	<div class="form-group">
		<label>Servey</label>

		<div class="input-group col-md-12">					
			<input type="text" class="form-control pull-right" name="title" value="{{ isset($survey) ? $survey->title : '' }}" >
		</div>
		<!-- /.input group -->
	</div>

	<!-- Date range -->
	<div class="form-group">
		<label>Servey Date range:</label>

		<div class="input-group">
			<div class="input-group-addon">
				<i class="fa fa-calendar"></i>
			</div>
			<input type="text" class="form-control pull-right" id="poll_date_range" name="poll_date_range" value="{{ isset($survey) ? $survey->date_range : '' }}">
		</div>
		<!-- /.input group -->
	</div>

	<div class="form-group">
		<label>Restriction</label>
		
		{!!
			Form::select('survey_restriction', 
				array(
					'Open for all' => 'Open for all', 
					'IP Restriction' => 'IP Restriction',
					'Register User Only' => 'Register User Only'), 
				isset($survey) ? $survey->survey_restriction : '', array('class' => 'form-control select2', 'style' => 'width: 100%;'))
				!!}

			</div>


			<!-- radio -->
			<div class="form-group">
				<label>User can take</label>
				<div class="input-group col-md-12">	
					<label>
						{!! 


							Form::radio('allowed_survey_no', 'One Time', ( isset($survey) && ( $survey->allowed_survey_no == "One Time") ) ? TRUE : False);

							!!} Only one time
							
						</label>
						<label>
							{!! 
								Form::radio('allowed_survey_no', 'Multiple Time', ( isset($survey) && ( $survey->allowed_survey_no == "Multiple Time") ) ? TRUE : False); 
								!!} Multiple Time 
						{{-- 	<input type="radio" name="allowed_survey_no" value="Multiple Time" class="minimal">
						Multiple time --}} 
					</label>
				</div>
			</div>


			<div class="form-group">
				<label>Redirect URL</label>

				<div class="input-group col-md-12">					
					<input type="text" class="form-control pull-right" name="redirect_url" value="{{ isset($survey) ? $survey->redirect_url : '' }}" >
				</div>
				<!-- /.input group -->
			</div>


			<!-- Minimal red style -->

			<div class="form-group">
				<label>Status</label>

				{!!
					Form::select('survey_status', 
						array(
							'Publish' => 'Publish', 
							'Unpublish' => 'Unpublish'), 
						isset($survey) ? $survey->survey_status : '', array('class' => 'form-control select2'))
						!!}
						
					</div>

					<div class="box-footer">
						<button class="btn btn-primary" type="submit">Submit</button>
					</div>
				</div>