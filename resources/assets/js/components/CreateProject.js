import React from 'react';
import ReactDOM from 'react-dom';

class CreateProject extends React.Component
{
	constructor(props)
	{
		super(props);

		this.state = {
			buttonText: 'Save Project',
			isSubmitted: false,
			name: '',
			title: '',
			expected_completion_date: '',
			country: '',
			city: '',
			community: '',
			latitude: '',
			longitude: '',
			dld_project_completion_link: '',
			project_escrow_account_details_link: '',
			description: '',
			category_id: '',
			types: [],
			type_ids: [],
			errorMessages: [],
		};

		this.handleChange = this.handleChange.bind(this);
		this.handleCategoryChange = this.handleCategoryChange.bind(this);
		// this.onSubmit = this.onSubmit.bind(this);
	}

	componentDidMount()
	{
		this.fetchCategories(1);
	}

	handleCategoryChange(e) {
		let category_id = e.target.value;

		this.fetchCategories(category_id);

		this.setState({ category_id });
	}

	fetchCategories(category_id)
	{
		let url = '/dashboard/categories/'+category_id;

		$.get(url, function(response) {
			this.setState({
				types: response.types
			});
		}.bind(this))

	}

	handleChange(e) {
		this.setState({
			[e.target.name]: e.target.value
		});
	}

	onSubmit(e) {
		e.preventDefault();

		this.setState({
			isSubmitted: true,
			buttonText: 'Saving Project'
		});

		let url = '/dashboard/developers/'+OffPlan.developer.id+'/projects';

		$.ajax({
			url: url,
			type: 'POST',
			data: $('#CreateProjectForm').serialize(),
			headers: { 'X-CSRF-Token': OffPlan.csrfToken },
			success: function(response) {
				swal({
					title: "OffPlan Property Dubai",  
					text: "You have successfully saved new Project",
					type: "success", 
					showConfirmButton: true
				});

				this.setState({
					buttonText: 'Save',
					isSubmitted: false
				})

				// Sets the new location of the current window.
				window.location = '/dashboard/developers/' + OffPlan.developer.id + '/projects/' + response.id;
				
			}.bind(this),
			error: function(message) {
				console.log(message.responseJSON);

				this.setState({
					errorMessages: message.responseJSON
				});
			}.bind(this)
		});
	}

	render()
	{
		let categories = OffPlan.categories.map((category) => {
			return (
				<option value={category.id} key={category.id}>
					{category.name}
				</option>
			)
		})

		let types = this.state.types.map((type) => {
			return (
				<option value={type.id} key={type.id}>
					{type.name}
				</option>
			)
		})

		// let errorMessages = Object.keys(this.state.errorMessages).forEach(function(key) {
		// 	console.log('key', key)
		// 	console.log('key array', this.state.errorMessages[key])
		// }.bind(this))

		return (
			<form method="POST" id="CreateProjectForm" onSubmit={this.onSubmit.bind(this)}>
				<h3>Project Details</h3>
				<div className="form-group">
					<label className="control-label">Developer</label>
					<input type="text" 
						className="form-control" 
						value={OffPlan.developer.name} 
						disabled />
				</div>

				<div className="row">
					<div className="col-md-6">
						<div className="form-group">
							<label htmlFor="name" className="control-label">Project Name*</label>
							<input type="text" 
								name="name" 
								id="name" 
								className="form-control" 
								onChange={this.handleChange}
								value={this.state.name} />
						</div>
					</div>
					<div className="col-md-6">
						<div className="form-group">
							<label htmlFor="title" className="control-label">Marketing Title*</label>
							<input type="text" 
								name="title" 
								id="title" 
								className="form-control" 
								onChange={this.handleChange}
								value={this.state.title} />
						</div>
					</div>
				</div>

				<div className="row">
					<div className="col-md-6">
						<div className="form-group">
							<label htmlFor="expected_completion_date" className="control-label">Expected Completion Date</label>
							<input 
								type="text" 
								name="expected_completion_date" 
								id="expected_completion_date" 
								className="form-control" 
								onChange={this.handleChange}
								value={this.state.expected_completion_date} />
						</div>
					</div>
				</div>

				<h3>Project Type</h3>

				<div className="row">
					<div className="col-md-6">
						<div className="form-group">
							<label htmlFor="project_type">Category</label>
							<select className="form-control" onChange={this.handleCategoryChange}>
								{ categories }
							</select>
						</div>
					</div>
					<div className="col-md-6">
						<div className="form-group">
							<label htmlFor="types">Types</label>
							{ this.state.types.length <= 0 ? <p>Please select Category</p> : 
								<select name="type_ids[]" className="form-control" multiple>
									{types}
								</select>
							}
						</div>
					</div>
				</div>

				<h3>Location</h3>

				<div className="row">
					<div className="col-md-4">
						<div className="form-group">
							<label htmlFor="country" className="control-label">Country*</label>
							<input type="text" 
								name="country" 
								id="country" 
								className="form-control" 
								onChange={this.handleChange}
								value={this.state.country} />
						</div>
					</div>
					<div className="col-md-4">
						<div className="form-group">
							<label htmlFor="city" className="control-label">City*</label>
							<input type="text" 
								name="city" 
								id="city" 
								className="form-control" 
								onChange={this.handleChange}
								value={this.state.city} />
						</div>
					</div>
					<div className="col-md-4">
						<div className="form-group">
							<label htmlFor="community" className="control-label">Community*</label>
							<input type="text" 
								name="community" 
								id="community" 
								className="form-control" 
								onChange={this.handleChange}
								value={this.state.community} />
						</div>
					</div>
				</div>

				<h3>Google Map</h3>

				<div className="row">
					<div className="col-md-6">
						<div className="form-group">
							<label htmlFor="latitude" className="control-label">Latitude</label>
							<input type="text" 
								name="latitude" 
								id="latitude" 
								className="form-control" 
								onChange={this.handleChange}
								value={this.state.latitude} />
						</div>
					</div>
					<div className="col-md-6">
						<div className="form-group">
							<label htmlFor="longitude" className="control-label">Longitude</label>
							<input type="text" 
								name="longitude" 
								id="longitude" 
								className="form-control" 
								onChange={this.handleChange}
								value={this.state.longitude} />
						</div>
					</div>
				</div>

				<h3>External Links</h3>
				
				<div className="row">
					<div className="col-md-6">
						<div className="form-group">
							<label htmlFor="dld_project_completion_link" className="control-label">DLD Project Completion %</label>
							<input type="text" 
								name="dld_project_completion_link" 
								id="dld_project_completion_link" 
								className="form-control" 
								onChange={this.handleChange}
								value={this.state.dld_project_completion_link} />
						</div>
					</div>
					<div className="col-md-6">
						<div className="form-group">
							<label htmlFor="project_escrow_account_details_link" className="control-label">Escrow Account Details Link</label>
							<input type="text" 
								name="project_escrow_account_details_link" 
								id="project_escrow_account_details_link" 
								className="form-control" 
								onChange={this.handleChange}
								value={this.state.project_escrow_account_details_link} />
						</div>
					</div>
				</div>

				<h3>Project Description</h3>

				<div className="form-group">
					<label htmlFor="description">&nbsp;</label>
					<textarea name="description" 
						id="editor" 
						className="form-control"
						onChange={this.handleChange}
						defaultValue={this.state.description}
					>
					</textarea>
				</div>

				<div className="form-group">
					<button type="submit" className="btn btn-lg btn-primary" onClick={this.onSubmit.bind(this)}>
						{ this.state.buttonText } <span>&nbsp;</span>
						{ this.state.isSubmitted ? <i className="fa fa-spinner fa-spin"></i> : <span></span> }
					</button>
				</div>
			</form>
		)
	}
}

ReactDOM.render(
	<CreateProject />,
	document.getElementById('CreateProject')
);