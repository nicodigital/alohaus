import Rellax from './rellax.min.js';

function customRellax() {

  const get_rellax = document.querySelector('.rellax');

  if ( get_rellax ) {  

  	function start_rellax() {
  		var rellax = new Rellax('.rellax', {
  			center: true
  		});
  	}

  	setTimeout(start_rellax(), 1000);

  }

}

export default customRellax