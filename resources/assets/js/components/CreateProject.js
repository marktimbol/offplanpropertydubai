import React from 'react';
import ReactDOM from 'react-dom';

class CreateProject extends React.Component
{
	constructor(props)
	{
		super(props);

		this.state = {
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
			description: ''
		};

		this.handleChange = this.handleChange.bind(this);
		// this.onSubmit = this.onSubmit.bind(this);
	}

	handleChange(e) {
		this.setState({
			[e.target.name]: e.target.value
		});
	}

	onSubmit(e) {
		e.preventDefault();

		console.log(this.state.name);
	}

	render()
	{
		return (
			<form method="POST" onSubmit={this.onSubmit.bind(this)}>
				<h3>Project Details</h3>

				<div className="form-group">
					<label className="control-label">Developer</label>
					<input type="text" 
						className="form-control" 
						value={OffPlan.name} 
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
								value="" />
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
								value="" />
						</div>
					</div>
				</div>

				<h3>Project Type</h3>

				<div className="row">
					<div className="col-md-6">
						<div className="form-group">
							<label htmlFor="project_type">Types</label>
							<select className="form-control">
								<option value=""></option>
								<option value="residential">Residential</option>
								<option value="commercial">Commercial</option>
								<option value="mixed-use">Mixed Use</option>
							</select>
						</div>
					</div>
					<div className="col-md-6">
						<div className="form-group">
							<label htmlFor="types">Sub Categories</label>
							<input type="text" id="types" className="form-control" />
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
								value="" />
						</div>
					</div>
					<div className="col-md-4">
						<div className="form-group">
							<label htmlFor="city" className="control-label">City*</label>
							<input type="text" 
								name="city" 
								id="city" 
								className="form-control" 
								value="" />
						</div>
					</div>
					<div className="col-md-4">
						<div className="form-group">
							<label htmlFor="community" className="control-label">Community*</label>
							<input type="text" 
								name="community" 
								id="community" 
								className="form-control" 
								value="" />
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
								value="" />
						</div>
					</div>
					<div className="col-md-6">
						<div className="form-group">
							<label htmlFor="longitude" className="control-label">Longitude</label>
							<input type="text" 
								name="longitude" 
								id="longitude" 
								className="form-control" 
								value="" />
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
								value="" />
						</div>
					</div>
					<div className="col-md-6">
						<div className="form-group">
							<label htmlFor="project_escrow_account_details_link" className="control-label">Escrow Account Details Link</label>
							<input type="text" 
								name="project_escrow_account_details_link" 
								id="project_escrow_account_details_link" 
								className="form-control" 
								value="" />
						</div>
					</div>
				</div>

				<h3>Project Description</h3>

				<div className="form-group">
					<label htmlFor="description">&nbsp;</label>
					<textarea name="description" id="editor" className="form-control">
						
					</textarea>
				</div>

				<div className="form-group">
					<button type="submit" className="btn btn-lg btn-primary" onClick={this.onSubmit.bind(this)}>
						<i className="fa fa-save"></i> Save
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