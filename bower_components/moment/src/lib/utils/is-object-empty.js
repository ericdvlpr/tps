export default function isObjectEmpty(obj) {
<<<<<<< HEAD
    if (Object.getOwnPropertyNames) {
        return (Object.getOwnPropertyNames(obj).length === 0);
    } else {
        var k;
        for (k in obj) {
            if (obj.hasOwnProperty(k)) {
                return false;
            }
        }
        return true;
    }
=======
    var k;
    for (k in obj) {
        // even if its not own property I'd still call it non-empty
        return false;
    }
    return true;
>>>>>>> 348c139e2bbd18748e499cc4d7f20e1f2b097a4b
}
