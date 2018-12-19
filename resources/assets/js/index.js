/**
 * Asset dependencies.
 */

// Styles
import '../scss/style.scss';

/**
 * WordPress dependencies.
 */
import { render } from '@wordpress/element';

const Component = () => {
	console.log( 'Running with JSX...' );

	return (
		<div>
			Just a boilerplate...
		</div>
	);
}

render( <Component />, document.getElementById( 'page' ) );
