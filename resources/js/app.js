import './bootstrap';
import 'bootstrap';
import 'bootstrap/dist/css/bootstrap.css';
import 'tom-select';
import TomSelect from 'tom-select';
import 'tom-select/dist/css/tom-select.bootstrap5.min.css';
import 'tom-select/dist/js/tom-select.complete';

var settings = {
  plugins: {remove_button: {title: 'Supprimer'}}
};
new TomSelect('select[multiple]', settings);