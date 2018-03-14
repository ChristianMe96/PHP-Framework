<?php

namespace Controller;


use Check24Framework\ControllerInterface;
use Check24Framework\Request;
use Check24Framework\ViewModel;

class Home implements ControllerInterface
{
    public function action(Request $request)

    {

        $mysql = new \mysqli('localhost', 'root', '', 'blog');
        if (mysqli_connect_errno())
        {
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
        $entries = $mysql->query('SELECT * FROM entries');


        $blogEntriesDB = $entries->fetch_all(MYSQLI_ASSOC);

        foreach ($blogEntriesDB as $i => $blogEntry) {
            if ($user = $mysql->query("SELECT * FROM users WHERE  ID = '$blogEntry[authorID]'")){
                $blogEntriesDB[$i]['author'] = $user->fetch_assoc()['username'];

            }
        }

        $dummyBlogEntries = [
            [
                'Date' => '2018.02.27',#new \DateTime('27.02.2018'),
                'Title' => 'Title 1',
                'Text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Cras cursus laoreet sem sodales blandit. Vestibulum at viverra tortor, 
                            sit amet blandit nunc. Donec sagittis vulputate velit non suscipit. 
                            Suspendisse fermentum, mauris quis elementum vehicula, sapien ante scelerisque neque, 
                            vel rhoncus eros sem id eros. 
                            Nunc vel mauris non felis aliquam bibendum eget pellentesque arcu. 
                            Praesent commodo elit finibus, dignissim libero at, dignissim dui. Sed nunc velit, 
                            semper ut maximus eu, faucibus vitae ipsum. Nulla facilisi. Aliquam vehicula sed lacus id lobortis.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Cras cursus laoreet sem sodales blandit. Vestibulum at viverra tortor, 
                            sit amet blandit nunc. Donec sagittis vulputate velit non suscipit. 
                            Suspendisse fermentum, mauris quis elementum vehicula, sapien ante scelerisque neque, 
                            vel rhoncus eros sem id eros. 
                            Nunc vel mauris non felis aliquam bibendum eget pellentesque arcu. 
                            Praesent commodo elit finibus, dignissim libero at, dignissim dui. Sed nunc velit, 
                            semper ut maximus eu, faucibus vitae ipsum. Nulla facilisi. Aliquam vehicula sed lacus id lobortis.
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Cras cursus laoreet sem sodales blandit. Vestibulum at viverra tortor, 
                            sit amet blandit nunc. Donec sagittis vulputate velit non suscipit. 
                            Suspendisse fermentum, mauris quis elementum vehicula, sapien ante scelerisque neque, 
                            vel rhoncus eros sem id eros. 
                            Nunc vel mauris non felis aliquam bibendum eget pellentesque arcu. 
                            Praesent commodo elit finibus, dignissim libero at, dignissim dui. Sed nunc velit, 
                            semper ut maximus eu, faucibus vitae ipsum. Nulla facilisi. Aliquam vehicula sed lacus id lobortis.',
                'Author' => 'Nickname 1',
                'Comments' => [
                    'Date' => '2006.10.06',
                    'Time' => '12:34',
                    'URL' => 'verlinkt auf die eingegebene URL',
                    'Comment' => 'Ich denke der Eintrag ist sehr gut, weiter so!'
                ]
            ],
            [
                'Date' => '2018.02.25',
                'Title' => 'Title 2',
                'Text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Cras cursus laoreet sem sodales blandit. Vestibulum at viverra tortor, 
                            sit amet blandit nunc. Donec sagittis vulputate velit non suscipit. 
                            Suspendisse fermentum, mauris quis elementum vehicula, sapien ante scelerisque neque, 
                            vel rhoncus eros sem id eros. 
                            Nunc vel mauris non felis aliquam bibendum eget pellentesque arcu. 
                            Praesent commodo elit finibus, dignissim libero at, dignissim dui. Sed nunc velit, 
                            semper ut maximus eu, faucibus vitae ipsum. Nulla facilisi. Aliquam vehicula sed lacus id lobortis.',
                'Author' => 'Nickname 2',
                'Comments' => 2
            ],
            [
                'Date' => '2018.01.28',
                'Title' => 'Title 3',
                'Text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Cras cursus laoreet sem sodales blandit. Vestibulum at viverra tortor, 
                            sit amet blandit nunc. Donec sagittis vulputate velit non suscipit. 
                            Suspendisse fermentum, mauris quis elementum vehicula, sapien ante scelerisque neque, 
                            vel rhoncus eros sem id eros. 
                            Nunc vel mauris non felis aliquam bibendum eget pellentesque arcu. 
                            Praesent commodo elit finibus, dignissim libero at, dignissim dui. Sed nunc velit, 
                            semper ut maximus eu, faucibus vitae ipsum. Nulla facilisi. Aliquam vehicula sed lacus id lobortis.',
                'Author' => 'Nickname 3',
                'Comments' => 1
            ],
            [
                'Date' => '2018.01.20',
                'Title' => 'Title 4',
                'Text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Cras cursus laoreet sem sodales blandit. Vestibulum at viverra tortor, 
                            sit amet blandit nunc. Donec sagittis vulputate velit non suscipit. 
                            Suspendisse fermentum, mauris quis elementum vehicula, sapien ante scelerisque neque, 
                            vel rhoncus eros sem id eros. 
                            Nunc vel mauris non felis aliquam bibendum eget pellentesque arcu. 
                            Praesent commodo elit finibus, dignissim libero at, dignissim dui. Sed nunc velit, 
                            semper ut maximus eu, faucibus vitae ipsum. Nulla facilisi. Aliquam vehicula sed lacus id lobortis.',
                'Author' => 'Nickname 4',
                'Comments' => 1
            ],
            [
                'Date' => '2018.01.10',
                'Title' => 'Title 5',
                'Text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Cras cursus laoreet sem sodales blandit. Vestibulum at viverra tortor, 
                            sit amet blandit nunc. Donec sagittis vulputate velit non suscipit. 
                            Suspendisse fermentum, mauris quis elementum vehicula, sapien ante scelerisque neque, 
                            vel rhoncus eros sem id eros. 
                            Nunc vel mauris non felis aliquam bibendum eget pellentesque arcu. 
                            Praesent commodo elit finibus, dignissim libero at, dignissim dui. Sed nunc velit, 
                            semper ut maximus eu, faucibus vitae ipsum. Nulla facilisi. Aliquam vehicula sed lacus id lobortis.',
                'Author' => 'Nickname 5',
                'Comments' => 1
            ],
            [
                'Date' => '2017.12.28',
                'Title' => 'Title 6',
                'Text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Cras cursus laoreet sem sodales blandit. Vestibulum at viverra tortor, 
                            sit amet blandit nunc. Donec sagittis vulputate velit non suscipit. 
                            Suspendisse fermentum, mauris quis elementum vehicula, sapien ante scelerisque neque, 
                            vel rhoncus eros sem id eros. 
                            Nunc vel mauris non felis aliquam bibendum eget pellentesque arcu. 
                            Praesent commodo elit finibus, dignissim libero at, dignissim dui. Sed nunc velit, 
                            semper ut maximus eu, faucibus vitae ipsum. Nulla facilisi. Aliquam vehicula sed lacus id lobortis.',
                'Author' => 'Nickname 6',
                'Comments' => 1
            ],
            [
                'Date' => '2017.12.28',
                'Title' => 'Title 7',
                'Text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Cras cursus laoreet sem sodales blandit. Vestibulum at viverra tortor, 
                            sit amet blandit nunc. Donec sagittis vulputate velit non suscipit. 
                            Suspendisse fermentum, mauris quis elementum vehicula, sapien ante scelerisque neque, 
                            vel rhoncus eros sem id eros. 
                            Nunc vel mauris non felis aliquam bibendum eget pellentesque arcu. 
                            Praesent commodo elit finibus, dignissim libero at, dignissim dui. Sed nunc velit, 
                            semper ut maximus eu, faucibus vitae ipsum. Nulla facilisi. Aliquam vehicula sed lacus id lobortis.',
                'Author' => 'Nickname 7',
                'Comments' => 1
            ],
            [
                'Date' => '2017.12.28',
                'Title' => 'Title 8',
                'Text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Cras cursus laoreet sem sodales blandit. Vestibulum at viverra tortor, 
                            sit amet blandit nunc. Donec sagittis vulputate velit non suscipit. 
                            Suspendisse fermentum, mauris quis elementum vehicula, sapien ante scelerisque neque, 
                            vel rhoncus eros sem id eros. 
                            Nunc vel mauris non felis aliquam bibendum eget pellentesque arcu. 
                            Praesent commodo elit finibus, dignissim libero at, dignissim dui. Sed nunc velit, 
                            semper ut maximus eu, faucibus vitae ipsum. Nulla facilisi. Aliquam vehicula sed lacus id lobortis.',
                'Author' => 'Nickname 8',
                'Comments' => 1
            ],
            [
                'Date' => '2017.12.28',
                'Title' => 'Title 9',
                'Text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Cras cursus laoreet sem sodales blandit. Vestibulum at viverra tortor, 
                            sit amet blandit nunc. Donec sagittis vulputate velit non suscipit. 
                            Suspendisse fermentum, mauris quis elementum vehicula, sapien ante scelerisque neque, 
                            vel rhoncus eros sem id eros. 
                            Nunc vel mauris non felis aliquam bibendum eget pellentesque arcu. 
                            Praesent commodo elit finibus, dignissim libero at, dignissim dui. Sed nunc velit, 
                            semper ut maximus eu, faucibus vitae ipsum. Nulla facilisi. Aliquam vehicula sed lacus id lobortis.',
                'Author' => 'Nickname 9',
                'Comments' => 1
            ],
            [
                'Date' => '2017.12.28',
                'Title' => 'Title 10',
                'Text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. 
                            Cras cursus laoreet sem sodales blandit. Vestibulum at viverra tortor, 
                            sit amet blandit nunc. Donec sagittis vulputate velit non suscipit. 
                            Suspendisse fermentum, mauris quis elementum vehicula, sapien ante scelerisque neque, 
                            vel rhoncus eros sem id eros. 
                            Nunc vel mauris non felis aliquam bibendum eget pellentesque arcu. 
                            Praesent commodo elit finibus, dignissim libero at, dignissim dui. Sed nunc velit, 
                            semper ut maximus eu, faucibus vitae ipsum. Nulla facilisi. Aliquam vehicula sed lacus id lobortis.',
                'Author' => 'Nickname 10',
                'Comments' => 1
            ]
        ];

        // PageNumber * 3 +3
        if (!isset($_SESSION['page'])) {
            $_SESSION['page'] = 0;
        } else if ($request->getFromPost('page')) {
            ++$_SESSION['page'];
        }



        if ($request->getFromPost('latestEntries')) {
            $_SESSION['page'] = 0;
        }

        if ($request->getFromQuery('Logout')) {
            unset($_SESSION['validity']);
        }


        if ($_SESSION['page'] == ceil(count($blogEntriesDB) / 3) - 1){
            $lastPage = true;
        }


        if (isset($_SESSION['addEntry'])) {
            array_unshift($dummyBlogEntries, [
                'Date' => str_replace('-', '.', $_SESSION['addEntry']['Date']),
                'Title' => $_SESSION['addEntry']['Title'],
                'Text' => $_SESSION['addEntry']['Text'],
                'Author' => $_SESSION['username'],
                'Comments' => 0
            ]);
            unset($_SESSION['addEntry']);
        }

        $blogEntries = array_slice($blogEntriesDB, $_SESSION['page'] * 3, 3);

        $viewModel = new ViewModel();
        $viewModel->setTemplate('../template/home/welcome-page.phtml');
        $viewModel->setTemplateVariables(['blogEntries' => $blogEntries, 'lastPage' => !empty($lastPage) ? $lastPage: '']);
        return $viewModel;
    }
}