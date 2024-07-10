
const _helper = {};

// Checks for valid numeric key input
_helper.isNumeric = function (e) {
    var charCode = e.which ? e.which : event.keyCode;
    return charCode >= 48 && charCode <= 57 ? true : false;
};

// Accept all characters
