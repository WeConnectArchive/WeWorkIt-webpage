import test from 'tape-catch';
import Runner from '../../src/Runner';

test('Runner', function(t) {
    t.plan(1);

    t.throws(function() {
        const runner = new Runner({ "rules": { "NotARealLinter": { "enabled": true }}});
        runner.lint('p { color: red; }');

    }, /Cannot load linter/, 'Throws error on trying to load a linter that does not exist');

});
