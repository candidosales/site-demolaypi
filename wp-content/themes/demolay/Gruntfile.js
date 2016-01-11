module.exports = function(grunt) {

  // 1. load all grunt tasks matching the `grunt-*` pattern
  var general = {
    sitemap: []
  };

  var sitemap = [];

  require('load-grunt-tasks')(grunt);

  // 2. All configuration goes here
  grunt.initConfig({
    rev: {
      options: {
        encoding: 'utf8',
        algorithm: 'md5',
        length: 8
      },
      assets: {
        files: [{
          src: [
            'dist/js/main.min.js',
            'dist/css/style.min.css'
          ]
        }]
      }
    },
    sass: {
      dev: {
        options: {
          style: 'expanded',
          lineNumbers: true
        },
        files: {
          'dist/css/style.css': 'dev/scss/style.scss',
          'dist/css/editor-style.css': 'dev/scss/editor-style.scss'
        }
      }
    },
    cssshrink: {
      options: {
        log: true
      },
      target: {
        files: {
          'tmp': ['dist/css/*.css']
        }
      }
    },
    exec: {
      get_grunt_sitemap: {
        command: 'curl --silent --output sitemap.json http://www.vikstar.local.com/?show_sitemap'
      }
    },
    uncss: {
      dist: {
        options: {
          ignore       : [/expanded/,/js/,/wp-/,/align/,/admin-bar/],
          stylesheets  : ['dist/css/style.css'],
          ignoreSheets : [/fonts.googleapis/],
          urls         : [], //Overwritten in load_sitemap_and_uncss task
        },
        files: {
          'dist/css/style.clean.css': sitemap
        }
      }
    },
    cssmin: {
      combine: {
        files: {
          'dist/css/style.min.css': ['dist/css/style.css']
        }
      }
    },
    cssmetrics: {
      dist: {
        src: [
          'dist/css/style.min.css'
        ]
      }
    },
    concat: {
      dev: {
        src: [
          'bower_components/jquery/dist/jquery.js',
          'bower_components/foundation/js/vendor/modernizr.js',
          'bower_components/foundation/js/vendor/fastclick.js',
          'dev/js/vendor/foundation.custom.min.js',
          'bower_components/slick-carousel/slick/slick.js',
          'dev/js/app.js'],
          dest: 'dist/js/main.js',
        },
  },
  uglify: {
    options: {
      compress: {
        drop_console: true
      }
    },
    dev: {
      files: {
        'dist/js/main.min.js': ['dist/js/main.js'],
      }
    },
  },
  imagemin: {
    dynamic: {                         // Another target
      files: [{
        expand: true,                  // Enable dynamic expansion
        cwd: 'dev/img/',                   // Src matches are relative to this path
        src: ['**/*.{png,jpg,gif}'],   // Actual patterns to match
        dest: 'dist/img/'                  // Destination path prefix
      }]
    }
  },
  includereplace: {
    html: {
      src: '*.html',
      dest: 'dist/'
    }
  },
  copy: {
    main: {
      files: [
        {expand: true, flatten: true, src: ['bower_components/foundation/js/vendor/modernizr.js'], dest: 'dist/js/', filter: 'isFile'}
      ]
    },
  },
  watch: {
    options: {
      livereload: true,
    },
    css: {
      files: 'dev/scss/**/*.scss',
      tasks: ['sass:dev','cssmin'],

    },
    img: {
      files: 'dev/img/**/*.{png,jpg,gif}',
      tasks: ['imagemin'],
    },
    js: {
      files: 'dev/js/**/*.js',
      tasks:['concat:dev','uglify:dev']
    },
  },
  connect: {
    server: {
      options: {
        port: 8000,
        base: './'
      }
    }
  }
});

// 4. Where we tell Grunt what to do when we type "grunt" into the terminal.
grunt.registerTask('default', ['sass:dev']);

grunt.registerTask('dev', ['connect', 'watch']);

grunt.registerTask('prod', ['sass:dev','cssmin','concat','uglify']);

grunt.registerTask('css', ['sass','uncss','cssmin']);

sitemap = grunt.registerTask('load_sitemap_json', function() {
  sitemap = grunt.file.readJSON('./sitemap.json');
  grunt.config.set('uncss.dist.options.urls', sitemap);
  return sitemap;
});

grunt.registerTask('deploy', ['exec:get_grunt_sitemap','load_sitemap_json','uncss:dist','cssmin:clean']);

};
