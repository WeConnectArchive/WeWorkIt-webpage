module.exports = function(grunt){

    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-watch');

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        concat:{
            js:{
                src: ['src/**/*.js'],
                dest: 'builds-dev/scripts.js',
                
            }
        },
        
        watch: {
        scripts: {
          files: '**/*.js',
          tasks: ['concat'],
          options: {
            
          },
        },
      },
    })

    

    grunt.registerTask('default', [
        'watch',
        'concat'
    ]);
}