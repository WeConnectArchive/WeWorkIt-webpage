const autoprefixer = require('autoprefixer');

module.exports = grunt => {
    grunt.initConfig({
        pkg             : grunt.file.readJSON('package.json'),
        devDir          : './builds-dev',
        buildsDir       : '../builds/css',
        versionDir      : '<%= buildsDir %>/<%= pkg.version %>',
        versionMobileDir: '<%= buildsDir %>/<%= pkg.versionMobile %>',
        cdnUrl          : '//static.im-g.pl/css/<%= pkg.name %>',
        banner          : '/*! <%= pkg.name %> compiled: <%= grunt.template.today("yyyy-mm-dd HH:MM:ss") %> */',
        sass            : {
            options: {
                sourcemap: false
            },
            dev: {
                options: {
                    style: 'expanded'
                },
                src : [ './src/main.scss' ],
                dest: '<%= devDir %>/main.css'
            },
            dev_mobile: {
                options: {
                    style: 'expanded'
                },
                src : [ './src-mobile/main.scss' ],
                dest: '<%= devDir %>/mobile_main.css'
            },
            production: {
                options: {
                    style: 'compressed'
                },
                src : [ './src/main.scss' ],
                dest: '<%= versionDir %>/main.min.css'
            },
            production_mobile: {
                options: {
                    style: 'compressed'
                },
                src : [ './src-mobile/main.scss' ],
                dest: '<%= versionMobileDir %>/mobile_main.min.css'
            }
        },
        postcss: {
            options: {
                processors: [
                    autoprefixer({
                        browsers: [ 'last 2 version', '> 0.2%', 'not dead' ]
                    })
                ]
            },
            dev: {
                src : '<%= devDir %>/main.css',
                dest: '<%= devDir %>/main.css'
            },
            dev_mobile: {
                src : '<%= devDir %>/mobile_main.css',
                dest: '<%= devDir %>/mobile_main.css'
            },
            production: {
                src : '<%= versionDir %>/main.min.css',
                dest: '<%= versionDir %>/main.min.css'
            },
            production_mobile: {
                src : '<%= versionMobileDir %>/mobile_main.min.css',
                dest: '<%= versionMobileDir %>/mobile_main.min.css'
            }
        },
        clean: {
            options    : { force: true },
            main       : [ '<%= versionDir %>/main.min.css' ],
            mobile_main: [ '<%= versionMobileDir %>/mobile_main.min.css' ]
        },
        compress: {
            options: {
                mode : 'gzip',
                level: 9
            },
            main: {
                files: [
                    {
                        expand: true,
                        src   : [ '<%= versionDir %>/main.min.css' ],
                        dest  : '.',
                        ext   : '.min.cssgz'
                    }
                ]
            },
            mobile_main: {
                files: [
                    {
                        expand: true,
                        src   : [ '<%= versionMobileDir %>/mobile_main.min.css' ],
                        dest  : '.',
                        ext   : '.min.cssgz'
                    }
                ]
            }
        },
        watch: {
            main: {
                files: [
                    './src/**/*.scss',
                    './src-mobile/**/*.scss'
                ],
                tasks: [
                    'sass:dev',
                    'sass:dev_mobile',
                    'postcss:dev',
                    'postcss:dev_mobile'
                ]
            }
        },
        usebanner: {
            options: {
                position: 'top',
                banner  : '<%= banner %>'
            },
            main: {
                files: {
                    src: [ '<%= versionDir %>/main.min.css' ]
                }
            },
            mobile_main: {
                files: {
                    src: [ '<%= versionMobileDir %>/mobile_main.min.css' ]
                }
            }
        },
        writeVersion: {
            main: {
                encoding: 'utf8',
                filepath: '<%= buildsDir %>/version.htm',
                content : '<link rel="stylesheet" href="<%= cdnUrl %>/<%= pkg.version %>/main.min.cssgz" />'
            },
            mobile: {
                encoding: 'utf8',
                filepath: '<%= buildsDir %>/mobile-version.htm',
                content : '<link rel="stylesheet" href="<%= cdnUrl %>/<%= pkg.versionMobile %>/mobile_main.min.cssgz" />'
            }
        }
    });

    grunt.registerTask('default', [
        'sass:dev',
        'sass:dev_mobile',
        'postcss:dev',
        'postcss:dev_mobile',
        'watch'
    ]);

    grunt.registerTask('production', [
        'sass:production',
        'postcss:production',
        'compress:main',
        'writeVersion:main',
        'usebanner:main',
        'clean:main'
    ]);

    grunt.registerTask('production-mobile', [
        'sass:production_mobile',
        'postcss:production_mobile',
        'compress:mobile_main',
        'writeVersion:mobile',
        'usebanner:mobile_main',
        'clean:mobile_main'
    ]);

    grunt.registerTask('writeVersion', '', target => {
        const data = grunt.config(`writeVersion.${target}`);

        return grunt.file.write(data.filepath, data.content, {
            encoding: data.encoding
        });
    });

    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-clean');
    grunt.loadNpmTasks('grunt-banner');
    grunt.loadNpmTasks('grunt-postcss');
    grunt.loadNpmTasks('grunt-contrib-compress');
};