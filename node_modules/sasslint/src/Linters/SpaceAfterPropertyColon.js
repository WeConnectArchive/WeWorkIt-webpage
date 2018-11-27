import Linter from './Linter';

/**
 * @class SpaceAfterPropertyColon
 *
 * Properties should be formatted with a single space separating
 * the colon from the property's value.
 */
class SpaceAfterPropertyColon extends Linter {

    /**
     * Types of nodes that this linter is interested in.
     * @see https://github.com/DFurnes/sasstree/tree/master/src/Nodes
     * @type {Array}
     */
    nodeTypes = ['Declaration'];

    /**
     * Default options.
     * @type {object}
     */
    defaults = {
        severity: 'warning',
        style: 'one_space',
    };

    run(node, lint) {
        let whitespaceChars = 0;
        for(let i = 0; i < node.value.length; i++) {
            if(node.value[i] === ' ') {
                whitespaceChars++;
            } else {
                break;
            }
        }

        // @TODO: For full scss-lint compatibility, need "one_space_or_newline" and "aligned" options
        switch(this.options.style) {
            // There should be zero spaces between the colon & property value.
            case 'no_space':
                if(whitespaceChars !== 0) this.error(node, 'Colon after property should be followed by no spaces.');
                break;

            // There should be exactly one space between the colon & property value.
            case 'one_space':
                if(whitespaceChars !== 1) this.error(node, 'Colon after property should be followed by one space.');
                break;

            case 'at_least_one_space':
                if(whitespaceChars < 1) this.error(node, 'Colon after property should be followed by at least one space.');
                break;

            default:
                lint(this.error(null, `Invalid option given for 'style'.`));
        }


        return null;
    }

}

export default SpaceAfterPropertyColon;
