import React from 'react';
import { Highlight } from 'react-instantsearch/dom';

class ProjectHit extends React.Component
{
	render()
	{
		let hit = this.props.hit;
		let url = '/projects/' + hit.name;

		return (
			<div>
				<span className="hit-name">
					<a href={url}>
						<Highlight attributeName="name" hit={hit} />
					</a>
				</span>
			</div>
		)
	}
}

export default ProjectHit;