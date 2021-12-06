<!-- Forms
================================================== -->
<div class="bs-docs-section mb-5">
	<h1 class="bs-docs-title" id="forms">Forms</h1>

	<div class="row">
		<div class="col-lg-6">
			<div class="bs-component">
				<form>
					<fieldset>
						<legend>Layout</legend>

						<div class="form-group mb-2">
							<label class="form-label" for="exampleInputEmail1" class="form-label">Email address</label>
							<input type="email" class="form-control" id="exampleInputEmail1"
								aria-describedby="emailHelp">
							<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
						</div>
						<div class="form-group mb-2">
							<label class="form-label" for="exampleInputPassword1" class="form-label">Password</label>
							<input type="password" class="form-control" id="exampleInputPassword1">
						</div>


						<div class="form-group mb-2 / row align-items-center">
							<div class="col-auto">
								<label for="inputPassword6" class="col-form-label">Password</label>
							</div>
							<div class="col-auto">
								<input type="password" id="inputPassword6" class="form-control"
									aria-describedby="passwordHelpInline">
							</div>
							<div class="col-auto">
								<span id="passwordHelpInline" class="form-text">
									Must be 8-20 characters long.
								</span>
							</div>
						</div>


						<div class="form-group mb-2">
							<label class="form-label" for="exampleSelect1">Example select</label>
							<select class="form-control" id="exampleSelect1">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>
						</div>
						<div class="form-group mb-2">
							<label class="form-label" for="exampleSelect2">Example multiple select</label>
							<select multiple="" class="form-control" id="exampleSelect2">
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
							</select>
						</div>
						<div class="form-group mb-2">
							<label class="form-label" for="exampleTextarea">Example textarea</label>
							<textarea class="form-control" id="exampleTextarea" rows="3"></textarea>
						</div>
						<div class="form-group mb-2">
							<label class="form-label" for="exampleInputFile">File input</label>
							<input type="file" class="form-control" id="exampleInputFile" aria-describedby="fileHelp">
							<small id="fileHelp" class="form-text text-muted">This is some placeholder block-level help
								text for the above input. It's a bit lighter and easily wraps to a new line.</small>
						</div>

						<fieldset class="form-group mb-2">
							<legend>Radio buttons</legend>
							<div class="form-check">
								<label class="form-check-label">
									<input type="radio" class="form-check-input" name="optionsRadios"
										id="optionsRadios1" value="option1" checked="">
									Option one is this and that—be sure to include why it's great
								</label>
							</div>
							<div class="form-check">
								<label class="form-check-label">
									<input type="radio" class="form-check-input" name="optionsRadios"
										id="optionsRadios2" value="option2">
									Option two can be something else and selecting it will deselect option one
								</label>
							</div>
							<div class="form-check disabled">
								<label class="form-check-label">
									<input type="radio" class="form-check-input" name="optionsRadios"
										id="optionsRadios3" value="option3" disabled="">
									Option three is disabled
								</label>
							</div>
						</fieldset>


						<fieldset class="form-group mb-2">
							<legend>Checkboxes</legend>
							<div class="form-check">
								<label class="form-check-label">
									<input class="form-check-input" type="checkbox" value="" checked="">
									Option one is this and that—be sure to include why it's great
								</label>
							</div>
							<div class="form-check disabled">
								<label class="form-check-label">
									<input class="form-check-input" type="checkbox" value="" disabled="">
									Option two is disabled
								</label>
							</div>
						</fieldset>

					</fieldset>
				</form>
			</div>
		</div>


		<div class="col-lg-6">
			<form class="bs-component">
				<fieldset>
					<legend>Utilities</legend>


					<div class="form-group mb-2">
						<fieldset disabled="">
							<label class="form-label" for="disabledInput">Disabled input</label>
							<input class="form-control" id="disabledInput" type="text"
								placeholder="Disabled input here..." disabled="">
						</fieldset>
					</div>

					<div class="form-group mb-2">
						<fieldset>
							<label class="form-label" for="readOnlyInput">Readonly input</label>
							<input class="form-control" id="readOnlyInput" type="text"
								placeholder="Readonly input here…" readonly="">
						</fieldset>
					</div>

					<div class="form-group mb-2 has-success">
						<label class="form-label" for="inputSuccess1">Valid input</label>
						<input type="text" value="correct value" class="form-control is-valid" id="inputValid">
						<div class="valid-feedback">Success! You've done it.</div>
					</div>

					<div class="form-group mb-2 has-danger">
						<label class="form-label" for="inputDanger1">Invalid input</label>
						<input type="text" value="wrong value" class="form-control is-invalid" id="inputInvalid">
						<div class="invalid-feedback">Sorry, that username's taken. Try another?</div>
					</div>

					<div class="form-group mb-2">
						<label class="col-form-label col-form-label-lg" for="inputLarge">Large input</label>
						<input class="form-control form-control-lg" type="text" placeholder="Large input" id="inputLarge">
					</div>

					<div class="form-group mb-2">
						<label class="col-form-label" for="inputDefault">Default input</label>
						<input type="text" class="form-control" placeholder="Default input" id="inputDefault">
					</div>

					<div class="form-group mb-2">
						<label class="col-form-label col-form-label-sm" for="inputSmall">Small input</label>
						<input class="form-control form-control-sm" type="text" placeholder="Small input" id="inputSmall">
					</div>

					<div class="form-group mb-2">
						<label class="form-label">Input addons</label>
						<div class="form-group mb-2">
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text">$</span>
								</div>
								<input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
								<div class="input-group-append">
									<span class="input-group-text">.00</span>
								</div>
							</div>
						</div>
					</div>
				</fieldset>
			</form>


		</div>
	</div>
</div>