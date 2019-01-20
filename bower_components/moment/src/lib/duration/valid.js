import toInt from '../utils/to-int';
<<<<<<< HEAD
import indexOf from '../utils/index-of';
=======
>>>>>>> 348c139e2bbd18748e499cc4d7f20e1f2b097a4b
import {Duration} from './constructor';
import {createDuration} from './create';

var ordering = ['year', 'quarter', 'month', 'week', 'day', 'hour', 'minute', 'second', 'millisecond'];

export default function isDurationValid(m) {
    for (var key in m) {
<<<<<<< HEAD
        if (!(indexOf.call(ordering, key) !== -1 && (m[key] == null || !isNaN(m[key])))) {
=======
        if (!(ordering.indexOf(key) !== -1 && (m[key] == null || !isNaN(m[key])))) {
>>>>>>> 348c139e2bbd18748e499cc4d7f20e1f2b097a4b
            return false;
        }
    }

    var unitHasDecimal = false;
    for (var i = 0; i < ordering.length; ++i) {
        if (m[ordering[i]]) {
            if (unitHasDecimal) {
                return false; // only allow non-integers for smallest unit
            }
            if (parseFloat(m[ordering[i]]) !== toInt(m[ordering[i]])) {
                unitHasDecimal = true;
            }
        }
    }

    return true;
}

export function isValid() {
    return this._isValid;
}

export function createInvalid() {
    return createDuration(NaN);
}
