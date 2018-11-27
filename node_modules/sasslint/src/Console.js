import Runner from './Runner';
import DefaultReporter from './Reporters/DefaultReporter';
import findParentDir from 'find-parent-dir';
import fs from 'fs';
import path from 'path';
import program from 'commander';
import util from 'util';

/**
 * Hello, CLI.
 */
program
    .version(require('../package.json').version)
    .usage('[options] <file>')
    .option('-b, --bench', 'measure and output timing data')
    .option('-c, --config', 'set configuration file')
    .parse(process.argv);

console.log('');

// File is a required parameter
if(program.args.length === 0) {
    console.error(`You must provide a source file. See 'sasslint -h' for details.`);
    process.exit(1);
}

/**
 * Read input.
 */
const file = path.resolve(program.args[0]);

// The file must exist!
if(!fs.existsSync(file)) {
    console.error(`Couldn't load '${file}'.`);
    process.exit(1);
}

const input = fs.readFileSync(file, 'utf-8');

/**
 * Read configuration file.
 */
let config = {};
if(program.config) {
    const configFile = path.resolve(program.config);

    // The file must exist!
    if(!fs.existsSync(file)) {
        console.error(`Couldn't load '${file}'.`);
        process.exit(1);
    }

    config = fs.readFileSync(file, 'utf-8');
} else {
    let dir = findParentDir.sync(path.dirname(file), '.sasslint.json');
    if(dir) {
        config = JSON.parse(fs.readFileSync(`${dir}/.sasslint.json`, 'utf-8'));
    }
}

/**
 * Lint!
 */
if(program.bench) {
    console.time('SassLint');
}

const runner = new Runner(config);
const lints = runner.lint(input, { bench: program.bench });

if(program.bench) {
    console.timeEnd('SassLint');
}

/**
 * Output the results.
 */
const reporter = new DefaultReporter();
reporter.report(lints, file);
reporter.summarize();
