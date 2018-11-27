import test from 'tape-catch';
import '../assertions';

test('SpaceAfterPropertyColon - when one space is preferred', function (t) {
    t.plan(7);

    const expectOne = {
        'SpaceAfterPropertyColon': {
            enabled: true,
            convention: 'one_space',
        }
    };

    t.isInvalid(expectOne, 'p { margin:0; }', 'when the colon after a property is not followed by space');
    t.isInvalid(expectOne, 'p { color:#eee }', 'when colon after property is not followed by space and the semicolon is missing');
    t.isValid(expectOne, 'p { color: red; }', 'when the colon after a property is followed by a space');
    t.isValid(expectOne, 'p { color : red; }', 'when the colon after a property is surrounded by spaces');
    t.isInvalid(expectOne, 'p { color:  red; }', 'when the colon after a property is followed by multiple spaces');

    t.isValid(expectOne, `[class~='\#{$test}'] { width: 100%; }`, 'when interpolation within single quotes is followed by inline property and property name is followed by a space');
    t.isInvalid(expectOne, `[class~='\#{$test}'] { width:100%; }`, 'when interpolation within single quotes is followed by inline property and property name is not followed by a space');

    // @TODO Add more tests!
});
