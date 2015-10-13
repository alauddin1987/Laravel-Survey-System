			<div class="form-group has-feedback">



				<div class="form-group">
					<label>Survey</label>
					{!!
						Form::select('survey_id', $survey_list, Request::segment(1), array('class' => 'form-control select2', 'style' => 'width: 100%;'))
					!!}

					</div>

					<div class="form-group">
						<label>Quesion/Topic</label>

						<div class="input-group col-md-12">					
							<input type="text" class="form-control pull-right" name="topic" value="{{ isset($question) ? $question->topic : '' }}" >
						</div>
						<!-- /.input group -->
					</div>


					<div class="form-group">
						<label>Answer Type </label>

						{!!
					Form::select('answer_type', $answer_types, isset($question) ? $question->answer_type : '', array('class' => 'form-control select2'))
						!!}

						</div>


					<!-- Minimal red style -->

					<div class="form-group">
						<label>Status</label>
						{!!
					Form::select('question_status', 
						array(
							'Publish' => 'Publish', 
							'Unpublish' => 'Unpublish'), 
						isset($question) ? $question->question_status : '', array('class' => 'form-control select2'))
						!!}
					</div>

					<div class="box-footer">
						<button class="btn btn-primary" type="submit">Submit</button>
					</div>
				</div>