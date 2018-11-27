import chalk from 'chalk';
import path from 'path';
import table from 'text-table';

/**
 * Format linting errors to be output to the console.
 */
class DefaultReporter {

    constructor() {
        this.lints = [];
    }

    report(lints, file) {
        if(lints.length === 0) return;

        console.log(chalk.underline(path.basename(file) + ':'));

        let t = [];
        lints.forEach(function(lint) {
            const lineRef = chalk.gray(`${lint.source.line}:${lint.source.column}`);
            const label = lint.severity === 'error' ? chalk.bold.red('error') : chalk.bold.yellow('warning');
            const linter = chalk.gray(lint.linter);

            t.push([lineRef, label, lint.error, linter]);
        });

        // Track lints for later summary.
        this.lints = this.lints.concat(lints);

        console.log(table(t));
    }

    summarize() {
        const errors = this.lints.filter((lint) => lint.severity === 'error');
        const warnings = this.lints.filter((lint) => lint.severity === 'warning');

        let footer = '\n';
        if(this.lints.length) {
            footer += chalk.red.bold('✖ ') + errors.length + ' errors';
        } else {
            footer += chalk.green.bold('✓ ') + 'No errors';
        }

        if(warnings.length) {
            footer += ', ' + warnings.length + ' warnings'
        }

        console.log(footer);
    }
}

export default DefaultReporter;
