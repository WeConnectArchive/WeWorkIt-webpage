import test from 'tape-catch';
import '../assertions';

test('BorderZero - when a convention of 0 is preferred', function(t) {
    t.plan(8);

    const expectZero = {
        'BorderZero': {
            enabled: true,
            convention: '0',
        }
    };

    t.isValid(expectZero, 'p { }', 'when a rule is empty');

    t.isValid(expectZero, 'p { border: 1px solid #000; }', 'has a normal border');
    t.isValid(expectZero, 'p { border: 0; }', 'has a border of 0');
    t.isInvalid(expectZero, 'p { border: none; }', 'has a border of none');
    t.isInvalid(expectZero, 'p { border-top: none; }', 'has a border-top of none');
    t.isInvalid(expectZero, 'p { border-right: none; }', 'has a border-right of none');
    t.isInvalid(expectZero, 'p { border-bottom: none; }', 'has a border-bottom of none');
    t.isInvalid(expectZero, 'p { border-left: none; }', 'has a border-left of none');
});

test('BorderZero - when a convention of none is preferred', function(t) {
    t.plan(3);

    const expectNone = {
        'BorderZero': {
            enabled: true,
            convention: 'none',
        }
    };

    t.isValid(expectNone, '.test { border: none; }', 'has a border of none');
    t.isInvalid(expectNone, '.test { border: 0; }', 'has a border of 0');
    t.isValid(expectNone, '.test { border: 5px; }', 'has a normal border');
});
