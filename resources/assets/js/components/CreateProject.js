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
			slug: '',
			title: '',
			price: '',
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
			cities: [],
			communities: [],
			community_id: '',
			errorMessages: [],
		};

		this.handleChange = this.handleChange.bind(this);
		this.handleCategoryChange = this.handleCategoryChange.bind(this);
		this.handleCountryChange = this.handleCountryChange.bind(this);
		this.handleCityChange = this.handleCityChange.bind(this);
		this.handleCommunityChange = this.handleCommunityChange.bind(this);
		// this.onSubmit = this.onSubmit.bind(this);
	}

	clearCommunities() {
		this.setState({
			communities: []
		})
	}

	clearCities() {
		this.setState({
			cities: []
		})
	}

	handleCategoryChange(e) {
		let category_id = e.target.value;

		this.fetchCategories(category_id);
		this.setState({ category_id });
	}

	handleCountryChange(e) {
		let country_id = e.target.value;
		this.fetchCities(country_id);
	}

	handleCityChange(e) {
		let city_id = e.target.value;
		this.fetchCommunities(city_id);
	}

	handleCommunityChange(e) {
		let community_id = e.target.value;
		this.setState({ community_id });
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

	fetchCities(country_id)
	{
		if( country_id == '' )
		{
			this.clearCities();
			this.clearCommunities();
		} else {		
			let url = '/api/countries/'+country_id+'/cities';
			$.get(url, function(response) {
				this.setState({
					cities: response
				});
				if( this.state.cities.length <= 0 ) {
					swal({
						title: App.name,  
						text: "No cities found.",
						type: "error", 
						showConfirmButton: true
					});
					this.clearCities();
					this.clearCommunities();
				}
			}.bind(this))
		}
	}

	fetchCommunities(city_id)
	{
		if( city_id == '' )
		{
			this.clearCommunities();
		} else {		
			let url = '/api/cities/'+city_id+'/communities';

			$.get(url, function(response) {
				this.setState({
					communities: response
				});
			}.bind(this))
		}
	}

	handleChange(e) {
		this.setState({
			[e.target.name]: e.target.value
		});
	}

	isSubmitting() {
		this.setState({
			isSubmitted: true,
			buttonText: 'Saving Project'
		});
	}

	onSubmit(e) {
		e.preventDefault();
		
		this.isSubmitting();

		let url = '/dashboard/developers/'+window.developer.id+'/projects';

		$.ajax({
			url: url,
			type: 'POST',
			data: $('#CreateProjectForm').serialize(),
			headers: { 'X-CSRF-Token': App.csrfToken },
			success: function(response) {
				swal({
					title: App.name,  
					text: "You have successfully saved new Project",
					type: "success", 
					showConfirmButton: true
				});

				this.setState({
					buttonText: 'Save',
					isSubmitted: false
				})

				// Sets the new location of the current window.
				window.location = '/dashboard/developers/' + window.developer.id + '/projects/' + response.id;
			
			}.bind(this),
			error: function(message) {
				this.setState({
					errorMessages: message.responseJSON
				});
			}.bind(this)
		});
	}

	render()
	{
		let categories = window.categories.map((category) => {
			return (
				<option value={category.id} key={category.id}>{category.name}</option>
			)
		})

		let types = this.state.types.map((type) => {
			return (
				<option value={type.id} key={type.id}>{type.name}</option>
			)
		})

		let countries = window.countries.map((country) => {
			return (
				<option value={country.id} key={country.id}>{country.name}</option>
			)	
		})

		let cities = this.state.cities.map((city) => {
			return (
				<option value={city.id} key={city.id}>{city.name}</option>
			)
		})

		let communities = this.state.communities.map((community) => {
			return (
				<option value={community.id} key={community.id}>{community.name}</option>
			)
		})

		return (
			<form method="POST" id="CreateProjectForm" onSubmit={this.onSubmit.bind(this)}>
				<h3>Project Details</h3>
				<div className="form-group">
					<label>Developer</label>
					<input type="text" 
						className="form-control" 
						defaultValue={window.developer.name} disabled />
				</div>

				<div className="row">
					<div className="col-md-6">
						<div className="form-group">
							<label>Project Name*</label>
							<input type="text" 
								name="name" 
								className="form-control" 
								onChange={this.handleChange}
								value={this.state.name} />
						</div>
					</div>
					<div className="col-md-6">
						<div className="form-group">
							<label>Slug*</label>
							<input type="text" 
								name="slug" 
								className="form-control" 
								placeholder="the-project-name"
								onChange={this.handleChange}
								value={this.state.slug} />
						</div>
					</div>
				</div>

				<div className="form-group">
					<label>Marketing Title*</label>
					<input type="text" 
						name="title" 
						className="form-control" 
						onChange={this.handleChange}
						value={this.state.title} />
				</div>

				<div className="row">
					<div className="col-md-6">
						<div className="form-group">
							<label>Price starting from</label>
							<input 
								type="text" 
								name="price" 
								className="form-control" 
								onChange={this.handleChange}
								value={this.state.price} />
						</div>
					</div>
					<div className="col-md-6">
						<div className="form-group">
							<label>Expected Completion Date</label>
							<input 
								type="text" 
								name="expected_completion_date" 
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
							<label>Category</label>
							<select className="form-control" onChange={this.handleCategoryChange}>
								<option value=""></option>
								{ categories }
							</select>
						</div>
					</div>
					<div className="col-md-6">
						<div className="form-group">
							<label>Types</label>
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
							<label>Country</label>
							<select className="form-control" onChange={this.handleCountryChange}>
								<option value=""></option>
								{ countries }
							</select>
						</div>
					</div>
					<div className="col-md-4">
						<div className="form-group">
							<label>City</label>
							<select className="form-control" onChange={this.handleCityChange}>
								<option value=""></option>
								{ cities }
							</select>
						</div>
					</div>
					<div className="col-md-4">
						<div className="form-group">
							<label>Community*</label>
							<select className="form-control" name="community_id" onChange={this.handleCommunityChange}>
								<option value=""></option>
								{ communities }
							</select>
						</div>
					</div>
				</div>

				<h3>Google Map</h3>

				<div className="row">
					<div className="col-md-6">
						<div className="form-group">
							<label>Latitude</label>
							<input type="text" 
								name="latitude" 
								className="form-control" 
								onChange={this.handleChange}
								value={this.state.latitude} />
						</div>
					</div>
					<div className="col-md-6">
						<div className="form-group">
							<label>Longitude</label>
							<input type="text" 
								name="longitude" 
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
							<label>DLD Project Completion %</label>
							<input type="text" 
								name="dld_project_completion_link" 
								className="form-control" 
								onChange={this.handleChange}
								value={this.state.dld_project_completion_link} />
						</div>
					</div>
					<div className="col-md-6">
						<div className="form-group">
							<label>Escrow Account Details Link</label>
							<input type="text" 
								name="project_escrow_account_details_link" 
								className="form-control" 
								onChange={this.handleChange}
								value={this.state.project_escrow_account_details_link} />
						</div>
					</div>
				</div>

				<h3>Project Description</h3>

				<div className="form-group">
					<label>&nbsp;</label>
					<textarea name="description" 
						id="editor" 
						className="form-control"
						onChange={this.handleChange}
						defaultValue={this.state.description}>
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