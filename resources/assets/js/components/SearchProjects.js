import React from 'react';
import ReactDOM from 'react-dom';
import { InstantSearch, Hits, SearchBox } from 'react-instantsearch/dom';
import ProjectHit from './ProjectHit';

class SearchProjects extends React.Component
{
	render()
	{
		return (
			<InstantSearch
				appId="BS2T4FJ0QH"
				apiKey="49196f4b9d0db57f7bff057d80913377"
				indexName="offplan_projects"
			>
				<div>
					<SearchBox />
					<Hits hitComponent={ProjectHit} />
				</div>
			</InstantSearch>
		)
	}
}

ReactDOM.render(
	<SearchProjects />,
	document.getElementById('SearchProjects')
);