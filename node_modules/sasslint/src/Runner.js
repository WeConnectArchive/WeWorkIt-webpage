import sasstree from 'sasstree';
import forEach from 'lodash/collection/forEach';

/**
 * @class Runner
 *
 * The runner is responsible for taking files, requesting
 * the AST, and passing it to interested linters.
 */
class Runner {
    constructor(config) {
        this.linters = [];

        // Initialize linters specified in the config
        if(config.rules) {
            forEach(config.rules, (options, rule) => {
                if(options.enabled) {
                    // Find the linter...
                    try {
                        const Linter = require(`./Linters/${rule}`);
                        const linter = new Linter(rule, options);
                        linter.initialize();

                        this.linters.push(linter);
                    } catch(e) {
                        throw new Error(`Cannot load linter "${rule}".`)
                    }
                }
            });
        }
    }

    /**
     * Parse an array of tokens.
     * @param {string} scss
     * @param {object} options
     */
    lint(scss, options = {}) {
        if(options && options.bench) {
            console.time('SassTree');
        }

        // Get the AST for the given SCSS source
        const ast = sasstree.parse(scss, { bench: options.bench });

        if(options && options.bench) {
            console.timeEnd('SassTree');
            console.time('lint');
        }

        let lints = [];

        ast.walk((node) => {
            this.linters.forEach((linter) => {
                if(linter.isInterested(node)) {
                    linter.onLint = function(lint) {
                        lints.push(lint);
                    };

                    linter.run(node);
                }
            });

        });

        if(options && options.bench) {
            console.timeEnd('lint');
        }

        return lints;
    }

}

export default Runner;
