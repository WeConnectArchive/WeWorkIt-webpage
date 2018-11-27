import Runner from '../src/Runner';
import { Test } from 'tape';

Test.prototype.isValid = function(rules, source, message = '`' + source + '` should be valid.') {
    const runner = new Runner({ "rules": rules });
    this.ok(runner.lint(source).length === 0, message);
};

Test.prototype.isInvalid = function(rules, source, message = '`' + source + '` should be invalid.') {
    const runner = new Runner({ "rules": rules });
    this.notOk(runner.lint(source).length === 0, message);
};


